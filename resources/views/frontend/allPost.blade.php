<div class="box">
    <div class="center">
        <!--<><><><><><><><><><><><><><><><><><><><><><><><><><> DEMO START <><><><><><><><><><><><><><><><><><><><><><><><><><>-->

        <!-- demo -->
        <div id="demo" class="box jplist" style="margin: 20px 0 50px 0">

            <!-- ios button: show/hide panel -->
            <div class="jplist-ios-button">
                <i class="fa fa-sort"></i>
                Menu
            </div>

            <!-- panel -->
            <div class="jplist-panel box panel-top">

                <!-- back button button -->
                <button
                        type="button"
                        data-control-type="back-button"
                        data-control-name="back-button"
                        data-control-action="back-button">
                    <i class="fa fa-arrow-left"></i> Go Back
                </button>

                <!-- reset button -->
                <button
                        type="button"
                        class="jplist-reset-btn"
                        data-control-type="reset"
                        data-control-name="reset"
                        data-control-action="reset">
                    Reset &nbsp;<i class="fa fa-share"></i>
                </button>

                <!-- items per page dropdown -->
                <div
                        class="jplist-drop-down"
                        data-control-type="items-per-page-drop-down"
                        data-control-name="paging"
                        data-control-action="paging">

                    <ul>
                        <li><span data-number="3"> 3 per page </span></li>
                        <li><span data-number="5"> 5 per page </span></li>
                        <li><span data-number="10" data-default="true"> 10 per page </span></li>
                        <li><span data-number="all"> View All </span></li>
                    </ul>
                </div>

                <!-- sort dropdown -->
                <div
                        class="jplist-drop-down"
                        data-control-type="sort-drop-down"
                        data-control-name="sort"
                        data-control-action="sort"
                        data-datetime-format="{month}/{day}/{year}"> <!-- {year}, {month}, {day}, {hour}, {min}, {sec} -->

                    <ul>
                        <li><span data-path="default">Sort by</span></li>
                        <li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span></li>
                        <li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span></li>
                        <li><span data-path=".desc" data-order="asc" data-type="text">Description A-Z</span></li>
                        <li><span data-path=".desc" data-order="desc" data-type="text">Description Z-A</span></li>
                        <li><span data-path=".like" data-order="asc" data-type="number" data-default="true">Likes asc</span></li>
                        <li><span data-path=".like" data-order="desc" data-type="number">Likes desc</span></li>
                        <li><span data-path=".date" data-order="asc" data-type="datetime">Date asc</span></li>
                        <li><span data-path=".date" data-order="desc" data-type="datetime">Date desc</span></li>
                    </ul>
                </div>

                <!-- filter by title -->
                <div class="text-filter-box">

                    <i class="fa fa-search  jplist-icon"></i>

                    <!--[if lt IE 10]>
                    <div class="jplist-label">Filter by Title:</div>
                    <![endif]-->

                    <input
                            data-path=".title"
                            type="text"
                            value=""
                            placeholder="Filter by Title"
                            data-control-type="textbox"
                            data-control-name="title-filter"
                            data-control-action="filter"
                    />
                </div>

                <!-- filter by description -->
                <div class="text-filter-box">

                    <i class="fa fa-search  jplist-icon"></i>

                    <!--[if lt IE 10]>
                    <div class="jplist-label">Filter by Description:</div>
                    <![endif]-->

                    <input
                            data-path=".desc"
                            type="text"
                            value=""
                            placeholder="Filter by Description"
                            data-control-type="textbox"
                            data-control-name="desc-filter"
                            data-control-action="filter"
                    />
                </div>

                <div class="jplist-group">
                    <ul>
                        <li>
						<span
                                data-control-type="button-filter"
                                data-control-action="filter"
                                data-control-name="event-btn"
                                data-path=".event"
                                data-selected="true">
								<i class="fa fa-caret-right"></i>
								Events
						</span>

                        <li>
						<span
                                data-control-type="button-filter"
                                data-control-action="filter"
                                data-control-name="project-btn"
                                data-path=".project">
								<i class="fa fa-caret-right"></i>
								Projects
						</span>

                        <li>
						<span
                                data-control-type="button-filter"
                                data-control-action="filter"
                                data-control-name="meeting-btn"
                                data-path=".meeting">
								<i class="fa fa-caret-right"></i>
								Meetings
						</span>

                    </ul>
                </div>

                <!-- pagination results -->
                <div
                        class="jplist-label"
                        data-type="Page {current} of {pages}"
                        data-control-type="pagination-info"
                        data-control-name="paging"
                        data-control-action="paging">
                </div>

                <!-- pagination control -->
                <div
                        class="jplist-pagination"
                        data-control-type="pagination"
                        data-control-name="paging"
                        data-control-action="paging">
                </div>

            </div>

            <!-- data -->
            <div class="list box text-shadow">
					<?php foreach($data as $events){?>
						 <!-- item 16 -->
						 <div class="list-item box">
							  <!-- img 
							  <div class="img left">
									<img src="img/thumbs/crayons.jpg" alt="" title=""/>
							  </div>
-->
							  <!-- data -->
							  <div class="block">
									<p class="date"><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo date("M j, Y", strtotime($events->created_at)); ?></p>
									<p class="title"><a href="post/event/<?php echo $events->id; ?>" ><?php echo $events->name; ?></a></p>
									<p class="desc"><?php echo $events->description; ?></p>
									<p class="theme">
										 <span class="event"><i class="glyphicon glyphicon-tag"></i> Type: Event</span>
									</p>
							  </div>
						 </div>
					<?php }?>
					<?php foreach($projects as $proj){?>
						 <!-- item 16 -->
						 <div class="list-item box">
							  <!-- img 
							  <div class="img left">
									<img src="img/thumbs/crayons.jpg" alt="" title=""/>
							  </div>
-->
							  <!-- data -->
							  <div class="block">
									<p class="date"><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo date("M j, Y", strtotime($proj->created_at)); ?></p>
									<p class="title"><a href="post/project/<?php echo $proj->id; ?>" ><?php echo $proj->name; ?></a></p>
									<p class="desc"><?php echo $proj->description; ?></p>
									<p class="theme">
										 <span class="project">Type: Project</span>
									</p>
							  </div>
						 </div>
					<?php }?>
					<?php foreach($upcoming_Meeting as $meeting){?>
						 <!-- item 16 -->
						 <div class="list-item box">
							  <!-- img 
							  <div class="img left">
									<img src="img/thumbs/crayons.jpg" alt="" title=""/>
							  </div>
-->
							  <!-- data -->
							  <div class="block">
									<p class="date"><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo date("M j, Y", strtotime($meeting->created_at)); ?></p>
									<p class="title"><a href="post/event/<?php echo $meeting->id; ?>" ><?php echo $meeting->title; ?></a></p>
									<p class="desc"><?php echo $meeting->description; ?></p>
									<p class="theme">
										 <span class="meeting">Type: Meeting</span>
									</p>
							  </div>
						 </div>
					<?php }?>
            </div>


            <div class="box jplist-no-results text-shadow align-center">
                <p>No results found</p>
            </div>

            <!-- ios button: show/hide panel -->
            <div class="jplist-ios-button">
                <i class="fa fa-sort"></i>
                Menu
            </div>

            <!-- panel -->
            <div class="jplist-panel box panel-bottom">

                <!-- items per page dropdown -->
                <div
                        class="jplist-drop-down"
                        data-control-type="items-per-page-drop-down"
                        data-control-name="paging"
                        data-control-action="paging"
                        data-control-animate-to-top="true">

                    <ul>
                        <li><span data-number="3"> 3 per page </span></li>
                        <li><span data-number="5"> 5 per page </span></li>
                        <li><span data-number="10" data-default="true"> 10 per page </span></li>
                        <li><span data-number="all"> View All </span></li>
                    </ul>
                </div>

                <!-- sort dropdown -->
                <div
                        class="jplist-drop-down"
                        data-control-type="sort-drop-down"
                        data-control-name="sort"
                        data-control-action="sort"
                        data-control-animate-to-top="true"
                        data-datetime-format="{month}/{day}/{year}"> <!-- {year}, {month}, {day}, {hour}, {min}, {sec} -->

                    <ul>
                        <li><span data-path="default">Sort by</span></li>
                        <li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span></li>
                        <li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span></li>
                        <li><span data-path=".desc" data-order="asc" data-type="text">Description A-Z</span></li>
                        <li><span data-path=".desc" data-order="desc" data-type="text">Description Z-A</span></li>
                        <li><span data-path=".like" data-order="asc" data-type="number" data-default="true">Likes asc</span></li>
                        <li><span data-path=".like" data-order="desc" data-type="number">Likes desc</span></li>
                        <li><span data-path=".date" data-order="asc" data-type="datetime">Date asc</span></li>
                        <li><span data-path=".date" data-order="desc" data-type="datetime">Date desc</span></li>
                    </ul>
                </div>

                <!-- pagination results -->
                <div
                        class="jplist-label"
                        data-type="{start} - {end} of {all}"
                        data-control-type="pagination-info"
                        data-control-name="paging"
                        data-control-action="paging">
                </div>

                <!-- pagination -->
                <div
                        class="jplist-pagination"
                        data-control-animate-to-top="true"
                        data-control-type="pagination"
                        data-control-name="paging"
                        data-control-action="paging">
                </div>

            </div>

        </div>
        <!-- end of demo -->
        <!--<><><><><><><><><><><><><><><><><><><><><><><><><><> DEMO END <><><><><><><><><><><><><><><><><><><><><><><><><><>-->
    </div>
</div>