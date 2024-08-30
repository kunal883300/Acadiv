<?php
$lang = $this->setting_model->get(); 
$session = $this->session->userdata('admin');

$id          = $session['id'];
$defoultlang = $this->setting_model->get_stafflang($id);

if (!empty($defoultlang)) {
    if ($defoultlang['lang_id'] != 0) {
        $defoult = $defoultlang['lang_id'];
    } else {
        $defoult = $lang[0]['lang_id'];
    }
}
$default = $this->db->select('languages.language')->from('languages')->where('id', $defoult)->get()->row()->language;

$json_languages = json_decode($lang[0]['languages']);

?>


<li class="dropdown language-dropdown d-none d-sm-block me-n1">
	<a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
		<div class="quick-icon border border-light">
			<img class="icon" src="<?php echo base_url(); ?>assets/images/flags/<?php echo strtolower($default); ?>-sq.png" alt="Language">
		</div>
	</a>
	<div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
		<ul class="language-list">
			<?php
				foreach ($json_languages as $value) {
				$result = $this->db->select('languages.language,`languages`.`country_code`')->from('languages')->where('id', $value)->get()->row_array();
			?>

			<li>
				<a onclick="set_languages(<?php echo $value; ?>)" class="btn language-item">
					<img src="<?php echo base_url(); ?>assets/images/flags/<?php echo strtolower($result['language']); ?>.png" alt="" class="language-flag">
					<span class="language-name"><?php echo $result['language']; ?></span>
				</a>
			</li>
			
			<?php } ?>
			
		</ul>
	</div>
</li><!-- .dropdown -->