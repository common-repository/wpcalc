<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<p style="color: #43cb83; font-size:36px; margin-top:0px; padding-top:0px;">Frequently Asked Questions</p>

<div class="wow-admin-col">

	
	<div class="wow-admin-col-12">
		<div class="items itembox">	
			<div class="item-title">
				<h3>How to calculate?</h3>
				<div class="toggle toggleshow" title="Hide"></div>
			</div>			
			<div class="inside" style="display: none;">	
			<ul>
				
				<li>Calculation can be made only in item type "Result"</li>
				<li>Enter the calculation formula using fields values as field_1(Field 1 value), field_2(Field 2 value) ...</li>
				<li>To print the calculation result, use {result} in the field "Result"</li>
			</ul>	
			</div>
		</div>
	</div>
	<div class="wow-admin-col-12">
		<div class="items itembox">	
			<div class="item-title">
				<h3>Which calculation operations are included?</h3>
				<div class="toggle toggleshow" title="Hide"></div>
			</div>			
			<div class="inside" style="display: none;">			
				<ul>
					<li>" + - * /  "- Simple arithmetic operations</li>
					<li>Math.abs(x) - Returns the absolute value of x</li>
					<li>Math.ceil(x) - Returns x, rounded upwards to the nearest integer</li>
					<li>Math.exp(x) - Returns the value of E<sup>x</sup></li>
					<li>Math.floor(x) - Returns x, rounded downwards to the nearest integer</li>
					<li>Math.log(x) - Returns the natural logarithm (base E) of x</li>
					<li>Math.pow(x, y) - Returns the value of x to the power of y</li>
					<li>Math.round(x) - Rounds x to the nearest integer</li>
					<li>Math.sqrt(x) - Returns the square root of x</li>
					<li>Math.max(x, y, z, ..., n) - Returns the number with the highest value</li>
					<li>Math.min(x, y, z, ..., n) - Returns the number with the lowest value</li>					
				</ul>
				Example:
				Math.round((field_1 + field_2 - field_3)*100)/100 - will return the calculation rounded to hundredths 
			</div>
		</div>
	</div>
	<div class="wow-admin-col-12">
		<div class="items itembox">	
			<div class="item-title">
				<h3>How can I round the calculated result to 2 decimal digits?</h3>
				<div class="toggle toggleshow" title="Hide"></div>
			</div>			
			<div class="inside" style="display: none;">	
				For examle, we need to round the result of formula = field_1 + field_2 - field_3<p/>
				<b>1 way.</b> Use only function Math.round:
				<ul>
				<li>Math.round((field_1 + field_2 - field_3)*100)/100</li>
				</ul>
				<b>2 way.</b> Use function .toFixed(2):
				<ul>
				<li>(field_1 + field_2 - field_3).toFixed(2)</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="wow-admin-col-12">
		<div class="items itembox">	
			<div class="item-title">
				<h3>Where can I publish a form?</h3>
				<div class="toggle toggleshow" title="Hide"></div>
			</div>			
			<div class="inside" style="display: none;">			
				You can publish the forms into pages, posts and widget. The shortcode can be also placed into the template.
			</div>
		</div>
	</div>	
</div>

<a href="https://wordpress.org/support/plugin/wpcalc" target="_blank" class="wow-btn">View support forum</a>