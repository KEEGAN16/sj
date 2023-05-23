<main>

    <section class="hero" id="section_1">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-12 m-auto">
                    <div class="hero-text">

                        <h1 class="text-white mb-4"><?=$conference[0]['name']?></h1>

                        <div class="d-flex justify-content-center align-items-center">
                            <span class="date-text"><?=$period?></span>

                            <span class="location-text"><?=$conference[0]['location']?></span>
                        </div>

                        <a href="#section_2" class="custom-link bi-arrow-down arrow-icon"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="video-wrap">
            <video autoplay="" loop="" muted="" class="custom-video" poster="">
                <source src="/assets/videos/pexels-pavel-danilyuk-8716790.mp4" type="video/mp4">

                Your browser does not support the video tag.
            </video>
        </div>
    </section>


    <section class="highlight">
        <div class="container">
            <div class="row">
                <?php foreach($videos as $v): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="highlight-thumb">
                        <img src="<?=$v['preview']?>"
                             class="highlight-image img-fluid" alt="">

                        <div class="highlight-info">
                            <h3 class="highlight-title"><?=$v['title']?></h3>

                            <a href="<?=$v['video_file']?>" class="bi-youtube highlight-icon"></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section class="about section-padding" id="section_2">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12">
                    <h2 class="mb-4">Our <u class="text-info">Story</u></h2>
                </div>

                <div class="col-lg-6 col-12">
                    <h3 class="mb-3">The importance of Leadership Conference in 2022</h3>

                    <p>Leadership Event is one-page Bootstrap v5.1.3 CSS layout for your website. Thank you for choosing
                        TemplateMo website where you can instantly download free CSS templates at no cost.</p>

                    <a class="custom-btn custom-border-btn btn custom-link mt-3 me-3" href="#section_3">Meet
                        Speakers</a>

                    <a class="custom-btn btn custom-link mt-3" href="#section_4">Check out Schedule</a>
                </div>

                <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                    <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        dolore</h4>

                    <div class="avatar-group border-top py-5 mt-5">
                        <img src="/assets/images/avatar/portrait-good-looking-brunette-young-asian-woman.jpg"
                             class="img-fluid avatar-image" alt="">

                        <img src="/assets/images/avatar/happy-asian-man-standing-with-arms-crossed-grey-wall.jpg"
                             class="img-fluid avatar-image avatar-image-left" alt="">

                        <img src="/assets/images/avatar/senior-man-white-sweater-eyeglasses.jpg"
                             class="img-fluid avatar-image avatar-image-left" alt="">

                        <img src="/assets/images/avatar/pretty-smiling-joyfully-female-with-fair-hair-dressed-casually-looking-with-satisfaction.jpg"
                             class="img-fluid avatar-image avatar-image-left" alt="">

                        <p class="d-inline">120+ People are attending with us</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="speakers section-padding" id="section_3">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 d-flex flex-column justify-content-center align-items-center">
                    <div class="speakers-text-info">
                        <h2 class="mb-4">Our <u class="text-info">Speakers</u></h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            dolore</p>
                    </div>
                </div>
                <?php foreach ($speakers as $s): ?>
                <?php if(intval($s['featured'])==1): ?>
                <div class="col-lg-6 col-12">
                    <div class="speakers-thumb">
                        <img src="/assets/images/avatar/happy-asian-man-standing-with-arms-crossed-grey-wall.jpg"
                             class="img-fluid speakers-image" alt="">

                        <small class="speakers-featured-text">Featured</small>

                        <div class="speakers-info">

                            <h5 class="speakers-title mb-0"><?=$s['first_name']?><?=(!empty($s['last_name'])?" " . $s['last_name']:"")?></h5>

                            <p class="speakers-text mb-0"><?=$s['position']?></p>

                            <ul class="social-icon">
                                <?php if(!empty($s['facebook'])): ?>
                                <li><a href="<?=$s['facebook']?>" class="social-icon-link bi-facebook"></a></li>
                                <?php endif; ?>
                                <?php if(!empty($s['instagram'])): ?>
                                <li><a href="<?=$s['instagram']?>" class="social-icon-link bi-instagram"></a></li>
                                <?php endif; ?>
                                <?php if(!empty($s['google'])): ?>
                                <li><a href="<?=$s['google']?>" class="social-icon-link bi-google"></a></li>
                                <?php endif; ?>
                                <?php if(!empty($s['whatsapp'])): ?>
                                <li><a href="<?=$s['whatsapp']?>" class="social-icon-link bi-whatsapp"></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>

                <div class="col-lg-12 col-12">
                    <div class="row">
                        <?php foreach ($speakers as $s): ?>
                            <?php if(intval($s['featured'])==0): ?>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="speakers-thumb speakers-thumb-small">
                                <img src="<?=$s["photo_file"]?>"
                                     class="img-fluid speakers-image" alt="">
                                <div class="speakers-info">
                                    <h5 class="speakers-title mb-0"><?=$s['first_name']?><?=(!empty($s['last_name'])?" " . $s['last_name']:"")?></h5>
                                    <p class="speakers-text mb-0"><?=$s['position']?></p>
                                    <ul class="social-icon">
                                        <?php if(!empty($s['facebook'])): ?>
                                            <li><a href="<?=$s['facebook']?>" class="social-icon-link bi-facebook"></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty($s['instagram'])): ?>
                                            <li><a href="<?=$s['instagram']?>" class="social-icon-link bi-instagram"></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty($s['google'])): ?>
                                            <li><a href="<?=$s['google']?>" class="social-icon-link bi-google"></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty($s['whatsapp'])): ?>
                                            <li><a href="<?=$s['whatsapp']?>" class="social-icon-link bi-whatsapp"></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="schedule section-padding" id="section_4">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <h2 class="mb-5 text-center">Next <u class="text-info">Schedules</u></h2>

                    <nav>
                        <div class="nav nav-tabs align-items-baseline" id="nav-tab" role="tablist">
                            <?php for($day = 1; $day <= $diff_in_days; $day++):?>
                                <?php $timestamp = strtotime($conference[0]['start_date'] .($day>1?" + ".($day-1)." days":"")); ?>
                            <button class="nav-link<?=($day==1?" active":"")?>" id="nav-Day<?=$day?>-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-Day<?=$day?>" type="button" role="tab" aria-controls="nav-Day<?=$day?>"
                                    aria-selected="true">
                                <h3>
                                    <span>Day <?=$day?></span>
                                    <small><?=ucfirst(date('F', $timestamp))?> <?=date('d', $timestamp)?>, <?=date('Y', $timestamp)?></small>
                                </h3>
                            </button>
                            <?php endfor; ?>
                        </div>
                    </nav>

                    <div class="tab-content mt-5" id="nav-tabContent">
                        <?php for($day = 1; $day <= $diff_in_days; $day++):?>
                            <?php $events = $data->getEventsByConferenceDay($conference[0]["conference_id"], $day); ?>
                        <div class="tab-pane fade show active" id="nav-Day<?=$day?>" role="tabpanel"
                             aria-labelledby="nav-Day<?=$day?>-tab">
                            <?php foreach ($events as $evt): ?>
                                <?php $speaker=$data->getSpeakerById($evt["speaker_id"]); ?>
                                <?php $hall=$data->getHallByEvent($conference[0]["conference_id"], $evt["event_id"]); ?>
                            <div class="row border-bottom pb-5 mb-5">
                                <div class="col-lg-4 col-12">
                                    <img src="<?=$evt["image"]?>"
                                         class="schedule-image img-fluid" alt="">
                                </div>

                                <div class="col-lg-8 col-12 mt-3 mt-lg-0">

                                    <h4 class="mb-2"><?=$evt["name"]?></h4>

                                    <p><?=$evt["description"]?></p>

                                    <div class="d-flex align-items-center mt-4">
                                        <?php if (is_array($speaker) && count($speaker) > 0): ?>
                                        <div class="avatar-group d-flex">
                                            <img src="<?=$speaker[0]["photo_file"]?>"
                                                 class="img-fluid avatar-image" alt="">

                                            <div class="ms-3">
                                                <?=$speaker[0]["first_name"] . ($speaker[0]["last_name"]?" ".$speaker[0]["last_name"]:"")?>
                                                <p class="speakers-text mb-0"><?=$speaker[0]["position"]?></p>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <span class="mx-3 mx-lg-5">
                                                    <i class="bi-clock me-2"></i>
                                                    <?=$evt["start_time"]?> - <?=$evt["end_time"]?>
                                                </span>

                                        <?php if (is_array($hall) && count($hall)>0): ?>
                                        <span class="mx-1 mx-lg-5">
                                                    <i class="bi-layout-sidebar me-2"></i>
                                                    <?=$hall[0]["name"]?>
                                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endfor; ?>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="pricing section-padding" id="section_5">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12 text-center mx-auto mb-5">
                    <h2>Get Your <u class="text-info">Tickets</u></h2>
                </div>

                <?php foreach($ticket_plans as $plan):?>
                <div class="col-lg-4 col-md-6 col-12 mb-5 mb-lg-0">
                    <div class="pricing-thumb bg-white shadow-lg">
                        <div class="pricing-title-wrap d-flex align-items-center">

                            <h4 class="pricing-title text-white mb-0"><?=$plan['name']?></h4>

                            <h5 class="pricing-small-title text-white mb-0 ms-auto">$<?=$plan['price']?></h5>
                        </div>
                        <?php $services = $data->getServicesByPlan($plan["plan_id"]); ?>
                        <div class="pricing-body">
                            <?php if(is_array($services) && count($services)>0): ?>
                                <?php foreach ($services as $serv):?>
                                    <?php
                                $serv_type_icon = "bi-cup";
                                switch($serv['type']) {
                                    case 1:
                                        $serv_type_icon = "bi-cup";
                                        break;
                                    case 2:
                                        $serv_type_icon = "bi-controller";
                                        break;
                                    case 3:
                                        $serv_type_icon = "bi-chat-square";
                                        break;
                                    case 4:
                                        $serv_type_icon = "bi-boombox";
                                        break;
                                }
                                    ?>
                            <p>
                                <i class="<?=$serv_type_icon?> me-2"></i> <?=$serv['title']?>
                            </p>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <div class="border-bottom pb-3 mb-4"></div>

                            <p><?=$plan['intro']?></p>

                            <a class="custom-btn btn mt-3" href="#section_7">Buy Tickets</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="venue section-padding" id="section_6">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <h2 class="mb-5">Here you go <u class="text-info">Venue</u></h2>
                </div>

                <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                    <div class="venue-thumb bg-white shadow-lg">

                        <div class="venue-info-title">
                            <h2 class="text-white mb-0"><?=$conference[0]['name']?></h2>
                        </div>

                        <div class="venue-info-body">
                            <h4 class="d-flex">
                                <i class="bi-geo-alt me-2"></i>
                                <span><?=$conference[0]['venue']?></span>
                            </h4>

                            <h5 class="mt-4 mb-3">
                                <a href="mailto:hello@yourgmail.com">
                                    <i class="bi-envelope me-2"></i>
                                    <?=$conference[0]['email']?>
                                </a>
                            </h5>

                            <h5 class="mb-0">
                                <a href="tel: 305-240-9671">
                                    <i class="bi-telephone me-2"></i>
                                    <?=$conference[0]['phone']?>
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="contact section-padding" id="section_7">
        <div class="container">
            <div class="row">
                <?php if (isset($_GET["buy_status"]) && $_GET["buy_status"]=="1") :?>
                    <div class="row">
                        <div class="col-lg-8 col-12 mx-auto bg-white">
                            <p>Your request has been received and your tickets have been reserved for 3 days. We will contact you shortly and advise you on how to pay for the tickets. </p>
                        </div>
                    </div>
                <?php else: ?>
                <div class="col-lg-8 col-12 mx-auto">
                    <form class="custom-form contact-form bg-white shadow-lg" action="/buy.php" method="post" role="form">
                        <h2>Buy tickets</h2>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name"
                                       required="">
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name"
                                       required="">
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control"
                                       placeholder="Email" required="">
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <input type="number" name="quantity" id="quantity" class="form-control"
                                       placeholder="Quantity">
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <select class="form-select" name="conference_id" id="conference_id">
                                    <?php foreach($conference as $c): ?>
                                    <option value="<?=$c["conference_id"]?>"><?=$c["name"]?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <select class="form-select" name="plan_id" id="plan_id">
                                    <?php foreach($ticket_plans as $p): ?>
                                    <option value="<?=$p["plan_id"]?>"><?=$p["name"]?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <button type="submit" class="form-control">Submit</button>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

</main>
