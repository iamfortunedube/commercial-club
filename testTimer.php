<div class="home-section promo">
		<div class="wrap">
			<div class="row gutter-40 middle-xs">
				<div class="col col-xs-12 col-sm-4 widget rwc-countdown">
					<div class="row bottom-xs-10 center-xs">
						<div class="col cd-head col-xs-12">
							<h4>20 SEPTEMBER - 2 NOVEMBER 2019</h4>
						</div>
					</div>
					<div class="row cd-date gutter-5 bottom-xs-10 center-xs">
						<?php
						$datetime1 = new DateTime('now', new DateTimeZone('Asia/Tokyo'));
						$datetime2 = new DateTime('20 September 2019');
						$interval = $datetime1->diff($datetime2);
						?>
						<div class="col col-xs-4">
							<a>
								<div class="up">
									<div class="shadow"></div>
									<div class="inn"><?echo $interval->format('%Y'); ?></div>
								</div>
								<div class="down">
									<div class="shadow"></div>
									<div class="inn"><?echo $interval->format('%Y'); ?></div>
								</div>
							</a>
						</div>
						<div class="col col-xs-4">
							<a>
								<div class="up">
									<div class="shadow"></div>
									<div class="inn"><?echo $interval->format('%m'); ?></div>
								</div>
								<div class="down">
									<div class="shadow"></div>
									<div class="inn"><?echo $interval->format('%m'); ?></div>
								</div>
							</a>
						</div>
						<div class="col col-xs-4">
							<a>
								<div class="up">
									<div class="shadow"></div>
									<div class="inn"><?echo $interval->format('%d'); ?></div>
								</div>
								<div class="down">
									<div class="shadow"></div>
									<div class="inn"><?echo $interval->format('%d'); ?></div>
								</div>
							</a>
						</div>
					</div>
					<div class="row cd-labels center-xs">
						<div class="col col-xs-4">Years</div>
						<div class="col col-xs-4">Months</div>
						<div class="col col-xs-4">Days</div>
					</div>
				</div>
				<div class="col col-xs-12 col-sm-4 widget gir">
					<div class="row center-xs middle-xs">
						<h3>Get Involved in Rugby</h3>
					</div>
				</div>
				<div class="col col-xs-12 col-sm-4 widget rugbypod">
					<div class="row center-xs middle-xs">
						<h3>Download RugbyPod</h3>
					</div>
				</div>
			</div>
		</div>
	</div>