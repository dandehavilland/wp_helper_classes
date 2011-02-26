<!-- The NONCE is required for validating authenticity of the request -->
<input type="hidden" name="<?=$this->nonce_name?>" value="<?=wp_create_nonce($this->nonce_name)?>" />

<p>
	<label for="<?=$this->meta_key?>_title">Some Meta Title:</label><br />
	<textarea style="width: 98%" rows="8" name="<?=$this->meta_key?>[title]" id="<?=$this->meta_key?>_title"><?=$data['title']?></textarea>
</p>
<p>
	<label for="<?=$this->meta_key?>_another_field">Another Field:</label><br />
	<textarea style="width: 98%" rows="8" name="<?=$this->meta_key?>[another_field]" id="<?=$this->meta_key?>_another_field"><?=$data['another_field']?></textarea>
</p>