<?php
function load_cc_mortgage_calc($id, $title, $currency, $show_url = 0, $bg_color, $border_color, $text_color)
{
    if ($show_url == 1)
        load_ccm_custom_colors($id, $bg_color, $border_color, $text_color);
?>

<input type="hidden" id="<?php echo $id; ?>-currency" value="<?php echo $currency; ?>"> 
<div class="CCM-Widget CCM-Widget-<?php echo $id; ?>">
	 	<div class="CCM-WidgetTitle CCM-WidgetTitle-<?php echo $id; ?>"><?php echo $title; ?></div>		   
        <div class="ccm-rowdiv">
			 <div class="ccm-leftdiv">
                <label for="<?php echo $id; ?>-purchase-price">Purchase price <?php echo $currency; ?> :</label>
			 </div>
			 <div class="ccm-rightdiv">
  	    	    <input id="<?php echo $id; ?>-purchase-price" class="purchase-price" type="text" placeholder="enter purchase price">
			 </div>
        </div>
        <div class="ccm-rowdiv">
			 <div class="ccm-leftdiv">
                <label for="<?php echo $id; ?>-down-payment">Down payment <?php echo $currency; ?> :</label>
			 </div>
			 <div class="ccm-rightdiv">
  	    	    <input id="<?php echo $id; ?>-down-payment" class="down-payment" type="text" placeholder="enter down payment">
			 </div>
        </div>
        <div class="ccm-rowdiv">
            <div class="ccm-leftdiv">
                <label for="<?php echo $id; ?>-mortgage-term">Mortgage term (years) :</label>
            </div>
			<div class="ccm-rightdiv">
                <input id="<?php echo $id; ?>-mortgage-term" class="mortgage-term" type="text" placeholder="enter term">
			</div>
        </div>
        <div class="ccm-rowdiv">
			<div class="ccm-leftdiv">
                <label for="<?php echo $id; ?>-mortgage-rate">Interest rate % :</label>
			 </div>
			 <div class="ccm-rightdiv">
                <input id="<?php echo $id; ?>-mortgage-rate" class="mortgage-rate" type="text" placeholder="enter rate">
			 </div>
        </div>
        <div class="ccm-rowdiv">
    		<div class="CCM-WidgetLine CCM-WidgetLine-<?php echo $id; ?>"></div>
		</div>
        <div class="ccm-rowdiv">
			 <div class="ccm-leftresultdiv">
                <label for="<?php echo $id; ?>-mortgage">Mortgage amount :</label>
			 </div>
			 <div class="ccm-rightresultdiv">
                <span id="<?php echo $id; ?>-mortgage" class="<?php echo $id; ?>-output"></span>
			 </div>
        </div>
        <div class="ccm-rowdiv">
			 <div class="ccm-leftresultdiv">
                <label for="<?php echo $id; ?>-monthlyPayment">Monthly payment :</label>
			 </div>
			 <div class="ccm-rightresultdiv">
                <span id="<?php echo $id; ?>-monthlyPayment" class="<?php echo $id; ?>-output"></span>
			 </div>
        </div>

        <?php if ($show_url) { ?>
    		<div class="ccm-rowdiv" >
                <div class="CCM-WidgetSignature CCM-WidgetSignature-<?php echo $id; ?>">Provided by <a href="http://mortgage.calculatorscanada.ca" target="_blank">CalculatorsCanada.ca</a></div>
		    </div>
        <?php } ?>
		
</div>

		
		<?php 
}


function load_ccm_custom_colors($id, $bg_color, $border_color, $text_color)
{
?>
<style type="text/css">
.CCM-Widget-<?php echo $id; ?>, .CCM-WidgetTitle-<?php echo $id; ?> a, .CCM-WidgetTitle-<?php echo $id; ?> a:visited, .CCM-WidgetSignature-<?php echo $id; ?> a, .CCM-WidgetSignature-<?php echo $id; ?> a:visited, .CCM-WidgetLine-<?php echo $id; ?> {
    <?php echo (isset( $border_color) ? "border-color:" . $border_color . ";" : ""); ?>
    <?php echo (isset( $bg_color) ? "background-color:" . $bg_color . ";": ""); ?>
    <?php echo (isset( $text_color) ? "color:" . $text_color . " !important;": ""); ?>
}

.CCM-Widget-<?php echo $id; ?> input[type=text] {
    <?php echo (isset( $border_color) ? "border-color:" . $border_color . ";": ""); ?>
    <?php echo (isset( $text_color) ? "color:" . $text_color . ";": ""); ?>
    <?php echo (isset( $input_bg_color) ? "background-color:" . $input_bg_color . ";": ""); ?>
} 
</style>
<?php 
}
?>