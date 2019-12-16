<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [ 
		'lib/assets.php', // Scripts and stylesheets
		'lib/extras.php', // Custom functions
		'lib/setup.php', // Theme setup
		'lib/titles.php', // Page titles
		'lib/wrapper.php', // Theme wrapper class
		'lib/customizer.php' // Theme customizer
];

foreach ( $sage_includes as $file ) {
	if (! $filepath = locate_template ( $file )) {
		trigger_error ( sprintf ( __ ( 'Error locating %s for inclusion', 'sage' ), $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
unset ( $file, $filepath );

//Register the main nav menu
add_action ( 'init', function () {
	register_nav_menus ( [ 
			'top_menu' => 'Top menu'
	] );
} );

//add custom classes to menu <li> and <a> tags
add_filter ( 'nav_menu_css_class', function ($classes, $item) {
	$classes [] = 'nav-item d-flex';
	if (in_array('current-menu-item', $classes) ){
		$classes[] = 'header__link--active';
	}
	return $classes;
}, 10, 2 );
add_filter ( 'nav_menu_link_attributes', function ($atts) {
	$atts ['class'] = "nav-link align-self-stretch py-0 header__link";
	return $atts;
}, 100, 1 );

//add metaboxes for employees
function employees_meta($page) {
	wp_nonce_field(basename(__FILE__), "employees-nonce");
	$args = array(
			'post_type' => 'attachment',
			'post_mime_type' =>'image',
			'post_status' => 'inherit',
	);
	$query_images = new WP_Query( $args );
	$images = array();
	foreach ( $query_images->posts as $image) {
		$images[$image->ID]= end(explode('/', $image->guid));
	}
	$totalEmployees = 5;
	if (get_post_meta($page->ID, "employeeCount", true) > 5)
		$totalEmployees = get_post_meta($page->ID, "employeeCount", true);
		for ($i=1; $i<=$totalEmployees; $i++ ) {?>
			<div>
				<p>Employee no. <?= $i?>:</p>
				<label for="employee-<?= $i?>-name">Name:</label>
				<input name="employee-<?= $i?>-name" type="text" value="<?php echo get_post_meta($page->ID, "employee-$i-name", true) ?>">
				<label for="employee-<?= $i?>-position">Position:</label>
				<input name="employee-<?= $i?>-position" type="text" value="<?php echo get_post_meta($page->ID, "employee-$i-position", true) ?>">
				<br>
				<label for="employee-<?= $i?>-description">Description:</label>
				<br>
				<textarea rows="4" cols="60" name="employee-<?= $i?>-description"><?php echo get_post_meta($page->ID, "employee-$i-description", true) ?></textarea>
				<br>
				<label for="employee-<?= $i?>-qoute">Qoute:</label>
				<br>
				<textarea rows="4" cols="60" name="employee-<?= $i?>-qoute"><?php echo get_post_meta($page->ID, "employee-$i-qoute", true) ?></textarea>
				<br>
				<label for="employee-<?= $i ?>-image">Select image from media library:</label>
				<br>
				<?php $currentImage = get_post_meta($page->ID, "employee-$i-image", true) ?>
				<select name="employee-<?= $i ?>-image">
					<option value="">( not selected )</option>
					<?php foreach ($images as $id=>$image) { ?>
						<option value="<?= $id ?>" <?= ($currentImage == $id ? "selected" : "") ?>><?= $image ?></option>
					<?php } ?>
				</select>
				<hr>
			</div>
		<?php } ?>
	<button type="button" id="addMore" class="components-button editor-post-preview is-button is-default is-large" style="margin-top: 5px">Add new employee</button>
	<input type="hidden" id="fieldCount" name="fieldCount" value="<?= $totalEmployees ?>">
	<div id="optionsBackup" style="display: none">
		<option value="">( not selected )</option>
		<?php foreach ($images as $id=>$image) { ?>	
			<option value="<?= $id ?>"><?= $image ?></option>
		<?php } ?>
	</div>
	<?php
}

function add_employees_meta_js($hook) {
	if ('post.php' !== $hook) {
		return;
	}
	wp_enqueue_script( 'employees-meta', get_template_directory_uri().'/js/employees-meta.js' );
}

add_action( 'add_meta_boxes', function($post_type, $post) {
	$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
	if ($pageTemplate == "about-us.php") {
		add_meta_box('employees_meta', 'Employees', 'employees_meta', 'page', 'normal');
		add_action('admin_enqueue_scripts', 'add_employees_meta_js');
	}
}, 10, 2);

//save metabox content for employees
add_action("save_post", function($post_id, $post, $update) {
	if (!isset($_POST["employees-nonce"]) ||
		!wp_verify_nonce($_POST["employees-nonce"], basename(__FILE__)))
	return $post_id;
	if(!current_user_can("edit_post", $post_id))
		return $post_id;
	
	foreach (get_post_meta($post_id) as $k=>$v) { //replace all current employees with blank strings
		if (strstr($k, "employee-"))
			update_post_meta($post_id, $k, "");
	}
		
	$totalEmployees = 5;
	$j = 1; //count filled fields
	if (isset($_POST['fieldCount'])) $totalEmployees = wp_kses_post($_POST['fieldCount']);
	for ($i=1; $i<=$totalEmployees; $i++ ) {
		$edited = false;
		if (isset($_POST["employee-$i-name"]) && $_POST["employee-$i-name"] != "") {
			update_post_meta($post_id, "employee-$j-name", wp_kses_post($_POST["employee-$i-name"]));
			$edited = true;
		}
		if (isset($_POST["employee-$i-position"]) && $_POST["employee-$i-position"] != "") {
			update_post_meta($post_id, "employee-$j-position", wp_kses_post($_POST["employee-$i-position"]));
			$edited = true;
		}
		if (isset($_POST["employee-$i-description"]) && $_POST["employee-$i-description"] != "") {
			update_post_meta($post_id, "employee-$j-description", wp_kses_post($_POST["employee-$i-description"]));
			$edited = true;
		}
		if (isset($_POST["employee-$i-qoute"]) && $_POST["employee-$i-qoute"] != "") {
			update_post_meta($post_id, "employee-$j-qoute", wp_kses_post($_POST["employee-$i-qoute"]));
			$edited = true;
		}
		if (isset($_POST["employee-$i-image"]) && $_POST["employee-$i-image"] != "") {
			update_post_meta($post_id, "employee-$j-image", wp_kses_post($_POST["employee-$i-image"]));
			$edited = true;
		}
		if ($edited)
			$j++;
	}
	update_post_meta($post_id, "employeeCount", $j - 1);
}, 10, 3);