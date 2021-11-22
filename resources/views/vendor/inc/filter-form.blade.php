
<div class="sidebar">
	@for($j=1;$j < 3; $j++)
	<div class="filter-field">
		<div class="filter-title">sub category filter</div>
		<div class="filter-cnt">
			@for($i=1;$i < 5; $i++)
			<div class="filter-form">
				<label class="ctm-container mb-0">Education
					<input type="checkbox" >
					<span class="checkmark"></span>
				</label>
			</div>
			@endfor
		</div>
		<div class="v-btn pt-2"><button class="btn ctm-btn black-btn">view more</button></div>
	</div>
	@endfor
</div>