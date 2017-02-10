<section class="banner">
	<div class="rev_slider_wrapper">
		<div id="main_slider" class="rev_slider"  data-version="5.0">
			<ul>	<!-- SLIDE  -->
					@for($i = 1; $i<=3; $i++)
						<li data-index="rs-280" data-transition="zoomout" data-slotamount="default"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-rotate="0"  data-saveperformance="off"  data-title="Intro" data-description="">
							<!-- MAIN IMAGE -->
							<img src="{{ asset('/images/banner/0'.$i.'.jpg') }}"  alt="image"  class="rev-slidebg" data-bgparallax="3" data-bgposition="center center" data-duration="2000" data-ease="Linear.easeNone" data-kenburns="on" data-no-retina="" data-offsetend="0 0" data-offsetstart="0 0" data-rotateend="0" data-rotatestart="0" data-scaleend="100" data-scalestart="140">
							<!-- LAYERS -->
						</li>
					@endfor
				</ul>
		</div>
	</div>
</section>