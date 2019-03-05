var tpl = `
<div>
    <section id="web-application" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">网页</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">
            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-adjust"></i><small class="text-secondary"> adjust</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-anchor"></i><small class="text-secondary"> anchor</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-archive"></i><small class="text-secondary"> archive</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-area-chart"></i><small class="text-secondary"> area-chart</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrows"></i><small class="text-secondary"> arrows</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrows-h"></i><small class="text-secondary"> arrows-h</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrows-v"></i><small class="text-secondary"> arrows-v</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-asterisk"></i><small class="text-secondary"> asterisk</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-at"></i><small class="text-secondary"> at</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-automobile"></i><small class="text-secondary"> automobile </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-balance-scale"></i><small class="text-secondary"> balance-scale</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ban"></i><small class="text-secondary"> ban</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bank"></i><small class="text-secondary"> bank </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bar-chart"></i><small class="text-secondary"> bar-chart</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bar-chart-o"></i><small class="text-secondary"> bar-chart-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-barcode"></i><small class="text-secondary"> barcode</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bars"></i><small class="text-secondary"> bars</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-battery-0"></i><small class="text-secondary"> battery-0 </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-battery-1"></i><small class="text-secondary"> battery-1 </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-battery-2"></i><small class="text-secondary"> battery-2 </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-battery-3"></i><small class="text-secondary"> battery-3 </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-battery-4"></i><small class="text-secondary"> battery-4 </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-battery-empty"></i><small class="text-secondary"> battery-empty</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-battery-full"></i><small class="text-secondary"> battery-full</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-battery-half"></i><small class="text-secondary"> battery-half</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-battery-quarter"></i><small class="text-secondary"> battery-quarter</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-battery-three-quarters"></i><small class="text-secondary"> battery-three-quarters</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bed"></i><small class="text-secondary"> bed</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-beer"></i><small class="text-secondary"> beer</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bell"></i><small class="text-secondary"> bell</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bell-o"></i><small class="text-secondary"> bell-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bell-slash"></i><small class="text-secondary"> bell-slash</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bell-slash-o"></i><small class="text-secondary"> bell-slash-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bicycle"></i><small class="text-secondary"> bicycle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-binoculars"></i><small class="text-secondary"> binoculars</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-birthday-cake"></i><small class="text-secondary"> birthday-cake</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bluetooth"></i><small class="text-secondary"> bluetooth</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bluetooth-b"></i><small class="text-secondary"> bluetooth-b</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bolt"></i><small class="text-secondary"> bolt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bomb"></i><small class="text-secondary"> bomb</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-book"></i><small class="text-secondary"> book</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bookmark"></i><small class="text-secondary"> bookmark</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bookmark-o"></i><small class="text-secondary"> bookmark-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-briefcase"></i><small class="text-secondary"> briefcase</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bug"></i><small class="text-secondary"> bug</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-building"></i><small class="text-secondary"> building</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-building-o"></i><small class="text-secondary"> building-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bullhorn"></i><small class="text-secondary"> bullhorn</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bullseye"></i><small class="text-secondary"> bullseye</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bus"></i><small class="text-secondary"> bus</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cab"></i><small class="text-secondary"> cab </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-calculator"></i><small class="text-secondary"> calculator</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-calendar"></i><small class="text-secondary"> calendar</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-calendar-check-o"></i><small class="text-secondary"> calendar-check-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-calendar-minus-o"></i><small class="text-secondary"> calendar-minus-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-calendar-o"></i><small class="text-secondary"> calendar-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-calendar-plus-o"></i><small class="text-secondary"> calendar-plus-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-calendar-times-o"></i><small class="text-secondary"> calendar-times-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-camera"></i><small class="text-secondary"> camera</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-camera-retro"></i><small class="text-secondary"> camera-retro</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-car"></i><small class="text-secondary"> car</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-caret-square-o-down"></i><small class="text-secondary"> caret-square-o-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-caret-square-o-left"></i><small class="text-secondary"> caret-square-o-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-caret-square-o-right"></i><small class="text-secondary"> caret-square-o-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-caret-square-o-up"></i><small class="text-secondary"> caret-square-o-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cart-arrow-down"></i><small class="text-secondary"> cart-arrow-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cart-plus"></i><small class="text-secondary"> cart-plus</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc"></i><small class="text-secondary"> cc</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-certificate"></i><small class="text-secondary"> certificate</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-check"></i><small class="text-secondary"> check</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-check-circle"></i><small class="text-secondary"> check-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-check-circle-o"></i><small class="text-secondary"> check-circle-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-check-square"></i><small class="text-secondary"> check-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-check-square-o"></i><small class="text-secondary"> check-square-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-child"></i><small class="text-secondary"> child</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-circle"></i><small class="text-secondary"> circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-circle-o"></i><small class="text-secondary"> circle-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-circle-o-notch"></i><small class="text-secondary"> circle-o-notch</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-circle-thin"></i><small class="text-secondary"> circle-thin</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-clock-o"></i><small class="text-secondary"> clock-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-clone"></i><small class="text-secondary"> clone</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-close"></i><small class="text-secondary"> close </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cloud"></i><small class="text-secondary"> cloud</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cloud-download"></i><small class="text-secondary"> cloud-download</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cloud-upload"></i><small class="text-secondary"> cloud-upload</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-code"></i><small class="text-secondary"> code</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-code-fork"></i><small class="text-secondary"> code-fork</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-coffee"></i><small class="text-secondary"> coffee</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cog"></i><small class="text-secondary"> cog</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cogs"></i><small class="text-secondary"> cogs</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-comment"></i><small class="text-secondary"> comment</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-comment-o"></i><small class="text-secondary"> comment-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-commenting"></i><small class="text-secondary"> commenting</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-commenting-o"></i><small class="text-secondary"> commenting-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-comments"></i><small class="text-secondary"> comments</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-comments-o"></i><small class="text-secondary"> comments-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-compass"></i><small class="text-secondary"> compass</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-copyright"></i><small class="text-secondary"> copyright</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-creative-commons"></i><small class="text-secondary"> creative-commons</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-credit-card"></i><small class="text-secondary"> credit-card</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-credit-card-alt"></i><small class="text-secondary"> credit-card-alt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-crop"></i><small class="text-secondary"> crop</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-crosshairs"></i><small class="text-secondary"> crosshairs</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cube"></i><small class="text-secondary"> cube</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cubes"></i><small class="text-secondary"> cubes</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cutlery"></i><small class="text-secondary"> cutlery</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-dashboard"></i><small class="text-secondary"> dashboard </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-database"></i><small class="text-secondary"> database</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-desktop"></i><small class="text-secondary"> desktop</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-diamond"></i><small class="text-secondary"> diamond</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-dot-circle-o"></i><small class="text-secondary"> dot-circle-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-download"></i><small class="text-secondary"> download</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-edit"></i><small class="text-secondary"> edit </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ellipsis-h"></i><small class="text-secondary"> ellipsis-h</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ellipsis-v"></i><small class="text-secondary"> ellipsis-v</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-envelope"></i><small class="text-secondary"> envelope</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-envelope-o"></i><small class="text-secondary"> envelope-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-envelope-square"></i><small class="text-secondary"> envelope-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-eraser"></i><small class="text-secondary"> eraser</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-exchange"></i><small class="text-secondary"> exchange</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-exclamation"></i><small class="text-secondary"> exclamation</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-exclamation-circle"></i><small class="text-secondary"> exclamation-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-exclamation-triangle"></i><small class="text-secondary"> exclamation-triangle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-external-link"></i><small class="text-secondary"> external-link</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-external-link-square"></i><small class="text-secondary"> external-link-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-eye"></i><small class="text-secondary"> eye</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-eye-slash"></i><small class="text-secondary"> eye-slash</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-eyedropper"></i><small class="text-secondary"> eyedropper</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-fax"></i><small class="text-secondary"> fax</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-feed"></i><small class="text-secondary"> feed </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-female"></i><small class="text-secondary"> female</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-fighter-jet"></i><small class="text-secondary"> fighter-jet</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-archive-o"></i><small class="text-secondary"> file-archive-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-audio-o"></i><small class="text-secondary"> file-audio-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-code-o"></i><small class="text-secondary"> file-code-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-excel-o"></i><small class="text-secondary"> file-excel-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-image-o"></i><small class="text-secondary"> file-image-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-movie-o"></i><small class="text-secondary"> file-movie-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-pdf-o"></i><small class="text-secondary"> file-pdf-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-photo-o"></i><small class="text-secondary"> file-photo-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-picture-o"></i><small class="text-secondary"> file-picture-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-powerpoint-o"></i><small class="text-secondary"> file-powerpoint-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-sound-o"></i><small class="text-secondary"> file-sound-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-video-o"></i><small class="text-secondary"> file-video-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-word-o"></i><small class="text-secondary"> file-word-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-zip-o"></i><small class="text-secondary"> file-zip-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-film"></i><small class="text-secondary"> film</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-filter"></i><small class="text-secondary"> filter</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-fire"></i><small class="text-secondary"> fire</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-fire-extinguisher"></i><small class="text-secondary"> fire-extinguisher</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-flag"></i><small class="text-secondary"> flag</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-flag-checkered"></i><small class="text-secondary"> flag-checkered</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-flag-o"></i><small class="text-secondary"> flag-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-flash"></i><small class="text-secondary"> flash </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-flask"></i><small class="text-secondary"> flask</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-folder"></i><small class="text-secondary"> folder</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-folder-o"></i><small class="text-secondary"> folder-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-folder-open"></i><small class="text-secondary"> folder-open</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-folder-open-o"></i><small class="text-secondary"> folder-open-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-frown-o"></i><small class="text-secondary"> frown-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-futbol-o"></i><small class="text-secondary"> futbol-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gamepad"></i><small class="text-secondary"> gamepad</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gavel"></i><small class="text-secondary"> gavel</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gear"></i><small class="text-secondary"> gear </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gears"></i><small class="text-secondary"> gears </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gift"></i><small class="text-secondary"> gift</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-glass"></i><small class="text-secondary"> glass</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-globe"></i><small class="text-secondary"> globe</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-graduation-cap"></i><small class="text-secondary"> graduation-cap</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-group"></i><small class="text-secondary"> group </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-grab-o"></i><small class="text-secondary"> hand-grab-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-lizard-o"></i><small class="text-secondary"> hand-lizard-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-paper-o"></i><small class="text-secondary"> hand-paper-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-peace-o"></i><small class="text-secondary"> hand-peace-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-pointer-o"></i><small class="text-secondary"> hand-pointer-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-rock-o"></i><small class="text-secondary"> hand-rock-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-scissors-o"></i><small class="text-secondary"> hand-scissors-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-spock-o"></i><small class="text-secondary"> hand-spock-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-stop-o"></i><small class="text-secondary"> hand-stop-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hashtag"></i><small class="text-secondary"> hashtag</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hdd-o"></i><small class="text-secondary"> hdd-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-headphones"></i><small class="text-secondary"> headphones</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-heart"></i><small class="text-secondary"> heart</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-heart-o"></i><small class="text-secondary"> heart-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-heartbeat"></i><small class="text-secondary"> heartbeat</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-history"></i><small class="text-secondary"> history</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-home"></i><small class="text-secondary"> home</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hotel"></i><small class="text-secondary"> hotel </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hourglass"></i><small class="text-secondary"> hourglass</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hourglass-1"></i><small class="text-secondary"> hourglass-1 </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hourglass-2"></i><small class="text-secondary"> hourglass-2 </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hourglass-3"></i><small class="text-secondary"> hourglass-3 </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hourglass-end"></i><small class="text-secondary"> hourglass-end</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hourglass-half"></i><small class="text-secondary"> hourglass-half</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hourglass-o"></i><small class="text-secondary"> hourglass-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hourglass-start"></i><small class="text-secondary"> hourglass-start</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-i-cursor"></i><small class="text-secondary"> i-cursor</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-image"></i><small class="text-secondary"> image </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-inbox"></i><small class="text-secondary"> inbox</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-industry"></i><small class="text-secondary"> industry</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-info"></i><small class="text-secondary"> info</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-info-circle"></i><small class="text-secondary"> info-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-institution"></i><small class="text-secondary"> institution </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-key"></i><small class="text-secondary"> key</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-keyboard-o"></i><small class="text-secondary"> keyboard-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-language"></i><small class="text-secondary"> language</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-laptop"></i><small class="text-secondary"> laptop</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-leaf"></i><small class="text-secondary"> leaf</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-legal"></i><small class="text-secondary"> legal </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-lemon-o"></i><small class="text-secondary"> lemon-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-level-down"></i><small class="text-secondary"> level-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-level-up"></i><small class="text-secondary"> level-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-life-bouy"></i><small class="text-secondary"> life-bouy </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-life-buoy"></i><small class="text-secondary"> life-buoy </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-life-ring"></i><small class="text-secondary"> life-ring</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-life-saver"></i><small class="text-secondary"> life-saver </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-lightbulb-o"></i><small class="text-secondary"> lightbulb-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-line-chart"></i><small class="text-secondary"> line-chart</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-location-arrow"></i><small class="text-secondary"> location-arrow</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-lock"></i><small class="text-secondary"> lock</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-magic"></i><small class="text-secondary"> magic</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-magnet"></i><small class="text-secondary"> magnet</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mail-forward"></i><small class="text-secondary"> mail-forward </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mail-reply"></i><small class="text-secondary"> mail-reply </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mail-reply-all"></i><small class="text-secondary"> mail-reply-all </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-male"></i><small class="text-secondary"> male</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-map"></i><small class="text-secondary"> map</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-map-marker"></i><small class="text-secondary"> map-marker</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-map-o"></i><small class="text-secondary"> map-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-map-pin"></i><small class="text-secondary"> map-pin</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-map-signs"></i><small class="text-secondary"> map-signs</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-meh-o"></i><small class="text-secondary"> meh-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-microphone"></i><small class="text-secondary"> microphone</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-microphone-slash"></i><small class="text-secondary"> microphone-slash</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-minus"></i><small class="text-secondary"> minus</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-minus-circle"></i><small class="text-secondary"> minus-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-minus-square"></i><small class="text-secondary"> minus-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-minus-square-o"></i><small class="text-secondary"> minus-square-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mobile"></i><small class="text-secondary"> mobile</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mobile-phone"></i><small class="text-secondary"> mobile-phone </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-money"></i><small class="text-secondary"> money</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-moon-o"></i><small class="text-secondary"> moon-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mortar-board"></i><small class="text-secondary"> mortar-board </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-motorcycle"></i><small class="text-secondary"> motorcycle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mouse-pointer"></i><small class="text-secondary"> mouse-pointer</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-music"></i><small class="text-secondary"> music</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-navicon"></i><small class="text-secondary"> navicon </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-newspaper-o"></i><small class="text-secondary"> newspaper-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-object-group"></i><small class="text-secondary"> object-group</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-object-ungroup"></i><small class="text-secondary"> object-ungroup</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-paint-brush"></i><small class="text-secondary"> paint-brush</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-paper-plane"></i><small class="text-secondary"> paper-plane</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-paper-plane-o"></i><small class="text-secondary"> paper-plane-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-paw"></i><small class="text-secondary"> paw</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pencil"></i><small class="text-secondary"> pencil</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pencil-square"></i><small class="text-secondary"> pencil-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pencil-square-o"></i><small class="text-secondary"> pencil-square-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-percent"></i><small class="text-secondary"> percent</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-phone"></i><small class="text-secondary"> phone</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-phone-square"></i><small class="text-secondary"> phone-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-photo"></i><small class="text-secondary"> photo </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-picture-o"></i><small class="text-secondary"> picture-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pie-chart"></i><small class="text-secondary"> pie-chart</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-plane"></i><small class="text-secondary"> plane</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-plug"></i><small class="text-secondary"> plug</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-plus"></i><small class="text-secondary"> plus</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-plus-circle"></i><small class="text-secondary"> plus-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-plus-square"></i><small class="text-secondary"> plus-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-plus-square-o"></i><small class="text-secondary"> plus-square-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-power-off"></i><small class="text-secondary"> power-off</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-print"></i><small class="text-secondary"> print</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-puzzle-piece"></i><small class="text-secondary"> puzzle-piece</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-qrcode"></i><small class="text-secondary"> qrcode</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-question"></i><small class="text-secondary"> question</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-question-circle"></i><small class="text-secondary"> question-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-quote-left"></i><small class="text-secondary"> quote-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-quote-right"></i><small class="text-secondary"> quote-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-random"></i><small class="text-secondary"> random</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-recycle"></i><small class="text-secondary"> recycle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-refresh"></i><small class="text-secondary"> refresh</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-registered"></i><small class="text-secondary"> registered</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-remove"></i><small class="text-secondary"> remove </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-reorder"></i><small class="text-secondary"> reorder </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-reply"></i><small class="text-secondary"> reply</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-reply-all"></i><small class="text-secondary"> reply-all</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-retweet"></i><small class="text-secondary"> retweet</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-road"></i><small class="text-secondary"> road</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-rocket"></i><small class="text-secondary"> rocket</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-rss"></i><small class="text-secondary"> rss</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-rss-square"></i><small class="text-secondary"> rss-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-search"></i><small class="text-secondary"> search</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-search-minus"></i><small class="text-secondary"> search-minus</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-search-plus"></i><small class="text-secondary"> search-plus</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-send"></i><small class="text-secondary"> send </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-send-o"></i><small class="text-secondary"> send-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-server"></i><small class="text-secondary"> server</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-share"></i><small class="text-secondary"> share</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-share-alt"></i><small class="text-secondary"> share-alt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-share-alt-square"></i><small class="text-secondary"> share-alt-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-share-square"></i><small class="text-secondary"> share-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-share-square-o"></i><small class="text-secondary"> share-square-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-shield"></i><small class="text-secondary"> shield</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ship"></i><small class="text-secondary"> ship</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-shopping-bag"></i><small class="text-secondary"> shopping-bag</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-shopping-basket"></i><small class="text-secondary"> shopping-basket</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-shopping-cart"></i><small class="text-secondary"> shopping-cart</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sign-in"></i><small class="text-secondary"> sign-in</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sign-out"></i><small class="text-secondary"> sign-out</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-signal"></i><small class="text-secondary"> signal</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sitemap"></i><small class="text-secondary"> sitemap</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sliders"></i><small class="text-secondary"> sliders</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-smile-o"></i><small class="text-secondary"> smile-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-soccer-ball-o"></i><small class="text-secondary"> soccer-ball-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sort"></i><small class="text-secondary"> sort</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sort-alpha-asc"></i><small class="text-secondary"> sort-alpha-asc</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sort-alpha-desc"></i><small class="text-secondary"> sort-alpha-desc</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sort-amount-asc"></i><small class="text-secondary"> sort-amount-asc</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sort-amount-desc"></i><small class="text-secondary"> sort-amount-desc</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sort-asc"></i><small class="text-secondary"> sort-asc</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sort-desc"></i><small class="text-secondary"> sort-desc</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sort-down"></i><small class="text-secondary"> sort-down </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sort-numeric-asc"></i><small class="text-secondary"> sort-numeric-asc</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sort-numeric-desc"></i><small class="text-secondary"> sort-numeric-desc</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sort-up"></i><small class="text-secondary"> sort-up </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-space-shuttle"></i><small class="text-secondary"> space-shuttle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-spinner"></i><small class="text-secondary"> spinner</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-spoon"></i><small class="text-secondary"> spoon</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-square"></i><small class="text-secondary"> square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-square-o"></i><small class="text-secondary"> square-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-star"></i><small class="text-secondary"> star</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-star-half"></i><small class="text-secondary"> star-half</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-star-half-empty"></i><small class="text-secondary"> star-half-empty </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-star-half-full"></i><small class="text-secondary"> star-half-full </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-star-half-o"></i><small class="text-secondary"> star-half-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-star-o"></i><small class="text-secondary"> star-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sticky-note"></i><small class="text-secondary"> sticky-note</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sticky-note-o"></i><small class="text-secondary"> sticky-note-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-street-view"></i><small class="text-secondary"> street-view</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-suitcase"></i><small class="text-secondary"> suitcase</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sun-o"></i><small class="text-secondary"> sun-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-support"></i><small class="text-secondary"> support </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tablet"></i><small class="text-secondary"> tablet</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tachometer"></i><small class="text-secondary"> tachometer</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tag"></i><small class="text-secondary"> tag</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tags"></i><small class="text-secondary"> tags</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tasks"></i><small class="text-secondary"> tasks</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-taxi"></i><small class="text-secondary"> taxi</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-television"></i><small class="text-secondary"> television</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-terminal"></i><small class="text-secondary"> terminal</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-thumb-tack"></i><small class="text-secondary"> thumb-tack</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-thumbs-down"></i><small class="text-secondary"> thumbs-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-thumbs-o-down"></i><small class="text-secondary"> thumbs-o-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-thumbs-o-up"></i><small class="text-secondary"> thumbs-o-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-thumbs-up"></i><small class="text-secondary"> thumbs-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ticket"></i><small class="text-secondary"> ticket</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-times"></i><small class="text-secondary"> times</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-times-circle"></i><small class="text-secondary"> times-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-times-circle-o"></i><small class="text-secondary"> times-circle-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tint"></i><small class="text-secondary"> tint</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-toggle-down"></i><small class="text-secondary"> toggle-down </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-toggle-left"></i><small class="text-secondary"> toggle-left </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-toggle-off"></i><small class="text-secondary"> toggle-off</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-toggle-on"></i><small class="text-secondary"> toggle-on</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-toggle-right"></i><small class="text-secondary"> toggle-right </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-toggle-up"></i><small class="text-secondary"> toggle-up </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-trademark"></i><small class="text-secondary"> trademark</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-trash"></i><small class="text-secondary"> trash</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-trash-o"></i><small class="text-secondary"> trash-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tree"></i><small class="text-secondary"> tree</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-trophy"></i><small class="text-secondary"> trophy</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-truck"></i><small class="text-secondary"> truck</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tty"></i><small class="text-secondary"> tty</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tv"></i><small class="text-secondary"> tv </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-umbrella"></i><small class="text-secondary"> umbrella</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-university"></i><small class="text-secondary"> university</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-unlock"></i><small class="text-secondary"> unlock</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-unlock-alt"></i><small class="text-secondary"> unlock-alt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-unsorted"></i><small class="text-secondary"> unsorted </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-upload"></i><small class="text-secondary"> upload</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-user"></i><small class="text-secondary"> user</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-user-plus"></i><small class="text-secondary"> user-plus</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-user-secret"></i><small class="text-secondary"> user-secret</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-user-times"></i><small class="text-secondary"> user-times</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-users"></i><small class="text-secondary"> users</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-video-camera"></i><small class="text-secondary"> video-camera</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-volume-down"></i><small class="text-secondary"> volume-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-volume-off"></i><small class="text-secondary"> volume-off</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-volume-up"></i><small class="text-secondary"> volume-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-warning"></i><small class="text-secondary"> warning </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-wheelchair"></i><small class="text-secondary"> wheelchair</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-wifi"></i><small class="text-secondary"> wifi</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-wrench"></i><small class="text-secondary"> wrench</small></a></div>

        </div>

    </section>

    <section id="hand" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">手势</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">


            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-grab-o"></i><small class="text-secondary"> hand-grab-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-lizard-o"></i><small class="text-secondary"> hand-lizard-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-o-down"></i><small class="text-secondary"> hand-o-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-o-left"></i><small class="text-secondary"> hand-o-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-o-right"></i><small class="text-secondary"> hand-o-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-o-up"></i><small class="text-secondary"> hand-o-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-paper-o"></i><small class="text-secondary"> hand-paper-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-peace-o"></i><small class="text-secondary"> hand-peace-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-pointer-o"></i><small class="text-secondary"> hand-pointer-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-rock-o"></i><small class="text-secondary"> hand-rock-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-scissors-o"></i><small class="text-secondary"> hand-scissors-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-spock-o"></i><small class="text-secondary"> hand-spock-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-stop-o"></i><small class="text-secondary"> hand-stop-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-thumbs-down"></i><small class="text-secondary"> thumbs-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-thumbs-o-down"></i><small class="text-secondary"> thumbs-o-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-thumbs-o-up"></i><small class="text-secondary"> thumbs-o-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-thumbs-up"></i><small class="text-secondary"> thumbs-up</small></a></div>

        </div>

    </section>

    <section id="transportation" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">运输</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">


            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ambulance"></i><small class="text-secondary"> ambulance</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-automobile"></i><small class="text-secondary"> automobile </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bicycle"></i><small class="text-secondary"> bicycle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bus"></i><small class="text-secondary"> bus</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cab"></i><small class="text-secondary"> cab </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-car"></i><small class="text-secondary"> car</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-fighter-jet"></i><small class="text-secondary"> fighter-jet</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-motorcycle"></i><small class="text-secondary"> motorcycle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-plane"></i><small class="text-secondary"> plane</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-rocket"></i><small class="text-secondary"> rocket</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ship"></i><small class="text-secondary"> ship</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-space-shuttle"></i><small class="text-secondary"> space-shuttle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-subway"></i><small class="text-secondary"> subway</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-taxi"></i><small class="text-secondary"> taxi</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-train"></i><small class="text-secondary"> train</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-truck"></i><small class="text-secondary"> truck</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-wheelchair"></i><small class="text-secondary"> wheelchair</small></a></div>

        </div>

    </section>


    <section id="gender" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">性别</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">


            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-genderless"></i><small class="text-secondary"> genderless</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-intersex"></i><small class="text-secondary"> intersex </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mars"></i><small class="text-secondary"> mars</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mars-double"></i><small class="text-secondary"> mars-double</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mars-stroke"></i><small class="text-secondary"> mars-stroke</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mars-stroke-h"></i><small class="text-secondary"> mars-stroke-h</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mars-stroke-v"></i><small class="text-secondary"> mars-stroke-v</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mercury"></i><small class="text-secondary"> mercury</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-neuter"></i><small class="text-secondary"> neuter</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-transgender"></i><small class="text-secondary"> transgender</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-transgender-alt"></i><small class="text-secondary"> transgender-alt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-venus"></i><small class="text-secondary"> venus</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-venus-double"></i><small class="text-secondary"> venus-double</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-venus-mars"></i><small class="text-secondary"> venus-mars</small></a></div>

        </div>

    </section>


    <section id="file-type" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">文件类型</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">


            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file"></i><small class="text-secondary"> file</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-archive-o"></i><small class="text-secondary"> file-archive-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-audio-o"></i><small class="text-secondary"> file-audio-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-code-o"></i><small class="text-secondary"> file-code-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-excel-o"></i><small class="text-secondary"> file-excel-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-image-o"></i><small class="text-secondary"> file-image-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-movie-o"></i><small class="text-secondary"> file-movie-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-o"></i><small class="text-secondary"> file-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-pdf-o"></i><small class="text-secondary"> file-pdf-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-photo-o"></i><small class="text-secondary"> file-photo-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-picture-o"></i><small class="text-secondary"> file-picture-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-powerpoint-o"></i><small class="text-secondary"> file-powerpoint-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-sound-o"></i><small class="text-secondary"> file-sound-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-text"></i><small class="text-secondary"> file-text</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-text-o"></i><small class="text-secondary"> file-text-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-video-o"></i><small class="text-secondary"> file-video-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-word-o"></i><small class="text-secondary"> file-word-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-zip-o"></i><small class="text-secondary"> file-zip-o </small></a></div>

        </div>

    </section>

    <section id="spinner" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">可旋转</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-circle-o-notch"></i><small class="text-secondary"> circle-o-notch</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cog"></i><small class="text-secondary"> cog</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gear"></i><small class="text-secondary"> gear </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-refresh"></i><small class="text-secondary"> refresh</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-spinner"></i><small class="text-secondary"> spinner</small></a></div>

        </div>
    </section>

    <section id="form-control" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">表单</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">


            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-check-square"></i><small class="text-secondary"> check-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-check-square-o"></i><small class="text-secondary"> check-square-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-circle"></i><small class="text-secondary"> circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-circle-o"></i><small class="text-secondary"> circle-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-dot-circle-o"></i><small class="text-secondary"> dot-circle-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-minus-square"></i><small class="text-secondary"> minus-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-minus-square-o"></i><small class="text-secondary"> minus-square-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-plus-square"></i><small class="text-secondary"> plus-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-plus-square-o"></i><small class="text-secondary"> plus-square-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-square"></i><small class="text-secondary"> square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-square-o"></i><small class="text-secondary"> square-o</small></a></div>

        </div>
    </section>

    <section id="payment" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">支付</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">


            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-amex"></i><small class="text-secondary"> cc-amex</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-diners-club"></i><small class="text-secondary"> cc-diners-club</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-discover"></i><small class="text-secondary"> cc-discover</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-jcb"></i><small class="text-secondary"> cc-jcb</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-mastercard"></i><small class="text-secondary"> cc-mastercard</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-paypal"></i><small class="text-secondary"> cc-paypal</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-stripe"></i><small class="text-secondary"> cc-stripe</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-visa"></i><small class="text-secondary"> cc-visa</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-credit-card"></i><small class="text-secondary"> credit-card</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-credit-card-alt"></i><small class="text-secondary"> credit-card-alt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-google-wallet"></i><small class="text-secondary"> google-wallet</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-paypal"></i><small class="text-secondary"> paypal</small></a></div>

        </div>

    </section>

    <section id="chart" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">图表</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">


            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-area-chart"></i><small class="text-secondary"> area-chart</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bar-chart"></i><small class="text-secondary"> bar-chart</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bar-chart-o"></i><small class="text-secondary"> bar-chart-o </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-line-chart"></i><small class="text-secondary"> line-chart</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pie-chart"></i><small class="text-secondary"> pie-chart</small></a></div>

        </div>

    </section>

    <section id="currency" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">货币</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">


            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bitcoin"></i><small class="text-secondary"> bitcoin </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-btc"></i><small class="text-secondary"> btc</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cny"></i><small class="text-secondary"> cny </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-dollar"></i><small class="text-secondary"> dollar </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-eur"></i><small class="text-secondary"> eur</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-euro"></i><small class="text-secondary"> euro </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gbp"></i><small class="text-secondary"> gbp</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gg"></i><small class="text-secondary"> gg</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gg-circle"></i><small class="text-secondary"> gg-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ils"></i><small class="text-secondary"> ils</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-inr"></i><small class="text-secondary"> inr</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-jpy"></i><small class="text-secondary"> jpy</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-krw"></i><small class="text-secondary"> krw</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-money"></i><small class="text-secondary"> money</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-rmb"></i><small class="text-secondary"> rmb </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-rouble"></i><small class="text-secondary"> rouble </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-rub"></i><small class="text-secondary"> rub</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ruble"></i><small class="text-secondary"> ruble </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-rupee"></i><small class="text-secondary"> rupee </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-shekel"></i><small class="text-secondary"> shekel </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sheqel"></i><small class="text-secondary"> sheqel </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-try"></i><small class="text-secondary"> try</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-turkish-lira"></i><small class="text-secondary"> turkish-lira </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-usd"></i><small class="text-secondary"> usd</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-won"></i><small class="text-secondary"> won </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-yen"></i><small class="text-secondary"> yen </small></a></div>

        </div>

    </section>

    <section id="text-editor" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">文本编辑</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">


            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-align-center"></i><small class="text-secondary"> align-center</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-align-justify"></i><small class="text-secondary"> align-justify</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-align-left"></i><small class="text-secondary"> align-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-align-right"></i><small class="text-secondary"> align-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bold"></i><small class="text-secondary"> bold</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-chain"></i><small class="text-secondary"> chain </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-chain-broken"></i><small class="text-secondary"> chain-broken</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-clipboard"></i><small class="text-secondary"> clipboard</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-columns"></i><small class="text-secondary"> columns</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-copy"></i><small class="text-secondary"> copy </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cut"></i><small class="text-secondary"> cut </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-dedent"></i><small class="text-secondary"> dedent </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-eraser"></i><small class="text-secondary"> eraser</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file"></i><small class="text-secondary"> file</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-o"></i><small class="text-secondary"> file-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-text"></i><small class="text-secondary"> file-text</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-file-text-o"></i><small class="text-secondary"> file-text-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-files-o"></i><small class="text-secondary"> files-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-floppy-o"></i><small class="text-secondary"> floppy-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-font"></i><small class="text-secondary"> font</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-header"></i><small class="text-secondary"> header</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-indent"></i><small class="text-secondary"> indent</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-italic"></i><small class="text-secondary"> italic</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-link"></i><small class="text-secondary"> link</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-list"></i><small class="text-secondary"> list</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-list-alt"></i><small class="text-secondary"> list-alt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-list-ol"></i><small class="text-secondary"> list-ol</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-list-ul"></i><small class="text-secondary"> list-ul</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-outdent"></i><small class="text-secondary"> outdent</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-paperclip"></i><small class="text-secondary"> paperclip</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-paragraph"></i><small class="text-secondary"> paragraph</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-paste"></i><small class="text-secondary"> paste </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-repeat"></i><small class="text-secondary"> repeat</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-rotate-left"></i><small class="text-secondary"> rotate-left </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-rotate-right"></i><small class="text-secondary"> rotate-right </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-save"></i><small class="text-secondary"> save </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-scissors"></i><small class="text-secondary"> scissors</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-strikethrough"></i><small class="text-secondary"> strikethrough</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-subscript"></i><small class="text-secondary"> subscript</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-superscript"></i><small class="text-secondary"> superscript</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-table"></i><small class="text-secondary"> table</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-text-height"></i><small class="text-secondary"> text-height</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-text-width"></i><small class="text-secondary"> text-width</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-th"></i><small class="text-secondary"> th</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-th-large"></i><small class="text-secondary"> th-large</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-th-list"></i><small class="text-secondary"> th-list</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-underline"></i><small class="text-secondary"> underline</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-undo"></i><small class="text-secondary"> undo</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-unlink"></i><small class="text-secondary"> unlink </small></a></div>

        </div>

    </section>

    <section id="directional" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">指示方向</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">


            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-angle-double-down"></i><small class="text-secondary"> angle-double-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-angle-double-left"></i><small class="text-secondary"> angle-double-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-angle-double-right"></i><small class="text-secondary"> angle-double-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-angle-double-up"></i><small class="text-secondary"> angle-double-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-angle-down"></i><small class="text-secondary"> angle-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-angle-left"></i><small class="text-secondary"> angle-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-angle-right"></i><small class="text-secondary"> angle-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-angle-up"></i><small class="text-secondary"> angle-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrow-circle-down"></i><small class="text-secondary"> arrow-circle-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrow-circle-left"></i><small class="text-secondary"> arrow-circle-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrow-circle-o-down"></i><small class="text-secondary"> arrow-circle-o-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrow-circle-o-left"></i><small class="text-secondary"> arrow-circle-o-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrow-circle-o-right"></i><small class="text-secondary"> arrow-circle-o-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrow-circle-o-up"></i><small class="text-secondary"> arrow-circle-o-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrow-circle-right"></i><small class="text-secondary"> arrow-circle-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrow-circle-up"></i><small class="text-secondary"> arrow-circle-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrow-down"></i><small class="text-secondary"> arrow-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrow-left"></i><small class="text-secondary"> arrow-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrow-right"></i><small class="text-secondary"> arrow-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrow-up"></i><small class="text-secondary"> arrow-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrows"></i><small class="text-secondary"> arrows</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrows-alt"></i><small class="text-secondary"> arrows-alt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrows-h"></i><small class="text-secondary"> arrows-h</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrows-v"></i><small class="text-secondary"> arrows-v</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-caret-down"></i><small class="text-secondary"> caret-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-caret-left"></i><small class="text-secondary"> caret-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-caret-right"></i><small class="text-secondary"> caret-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-caret-square-o-down"></i><small class="text-secondary"> caret-square-o-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-caret-square-o-left"></i><small class="text-secondary"> caret-square-o-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-caret-square-o-right"></i><small class="text-secondary"> caret-square-o-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-caret-square-o-up"></i><small class="text-secondary"> caret-square-o-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-caret-up"></i><small class="text-secondary"> caret-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-chevron-circle-down"></i><small class="text-secondary"> chevron-circle-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-chevron-circle-left"></i><small class="text-secondary"> chevron-circle-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-chevron-circle-right"></i><small class="text-secondary"> chevron-circle-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-chevron-circle-up"></i><small class="text-secondary"> chevron-circle-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-chevron-down"></i><small class="text-secondary"> chevron-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-chevron-left"></i><small class="text-secondary"> chevron-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-chevron-right"></i><small class="text-secondary"> chevron-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-chevron-up"></i><small class="text-secondary"> chevron-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-exchange"></i><small class="text-secondary"> exchange</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-o-down"></i><small class="text-secondary"> hand-o-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-o-left"></i><small class="text-secondary"> hand-o-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-o-right"></i><small class="text-secondary"> hand-o-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hand-o-up"></i><small class="text-secondary"> hand-o-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-long-arrow-down"></i><small class="text-secondary"> long-arrow-down</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-long-arrow-left"></i><small class="text-secondary"> long-arrow-left</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-long-arrow-right"></i><small class="text-secondary"> long-arrow-right</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-long-arrow-up"></i><small class="text-secondary"> long-arrow-up</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-toggle-down"></i><small class="text-secondary"> toggle-down </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-toggle-left"></i><small class="text-secondary"> toggle-left </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-toggle-right"></i><small class="text-secondary"> toggle-right </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-toggle-up"></i><small class="text-secondary"> toggle-up </small></a></div>

        </div>

    </section>

    <section id="video-player" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">视频播放</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">


            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-arrows-alt"></i><small class="text-secondary"> arrows-alt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-backward"></i><small class="text-secondary"> backward</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-compress"></i><small class="text-secondary"> compress</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-eject"></i><small class="text-secondary"> eject</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-expand"></i><small class="text-secondary"> expand</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-fast-backward"></i><small class="text-secondary"> fast-backward</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-fast-forward"></i><small class="text-secondary"> fast-forward</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-forward"></i><small class="text-secondary"> forward</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pause"></i><small class="text-secondary"> pause</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pause-circle"></i><small class="text-secondary"> pause-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pause-circle-o"></i><small class="text-secondary"> pause-circle-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-play"></i><small class="text-secondary"> play</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-play-circle"></i><small class="text-secondary"> play-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-play-circle-o"></i><small class="text-secondary"> play-circle-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-random"></i><small class="text-secondary"> random</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-step-backward"></i><small class="text-secondary"> step-backward</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-step-forward"></i><small class="text-secondary"> step-forward</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-stop"></i><small class="text-secondary"> stop</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-stop-circle"></i><small class="text-secondary"> stop-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-stop-circle-o"></i><small class="text-secondary"> stop-circle-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-youtube-play"></i><small class="text-secondary"> youtube-play</small></a></div>

        </div>

    </section>

    <section id="brand" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">标志</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list margin-bottom-lg">


            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-500px"></i><small class="text-secondary"> 500px</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-adn"></i><small class="text-secondary"> adn</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-amazon"></i><small class="text-secondary"> amazon</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-android"></i><small class="text-secondary"> android</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-angellist"></i><small class="text-secondary"> angellist</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-apple"></i><small class="text-secondary"> apple</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-behance"></i><small class="text-secondary"> behance</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-behance-square"></i><small class="text-secondary"> behance-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bitbucket"></i><small class="text-secondary"> bitbucket</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bitbucket-square"></i><small class="text-secondary"> bitbucket-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bitcoin"></i><small class="text-secondary"> bitcoin </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-black-tie"></i><small class="text-secondary"> black-tie</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bluetooth"></i><small class="text-secondary"> bluetooth</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-bluetooth-b"></i><small class="text-secondary"> bluetooth-b</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-btc"></i><small class="text-secondary"> btc</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-buysellads"></i><small class="text-secondary"> buysellads</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-amex"></i><small class="text-secondary"> cc-amex</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-diners-club"></i><small class="text-secondary"> cc-diners-club</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-discover"></i><small class="text-secondary"> cc-discover</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-jcb"></i><small class="text-secondary"> cc-jcb</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-mastercard"></i><small class="text-secondary"> cc-mastercard</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-paypal"></i><small class="text-secondary"> cc-paypal</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-stripe"></i><small class="text-secondary"> cc-stripe</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-cc-visa"></i><small class="text-secondary"> cc-visa</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-chrome"></i><small class="text-secondary"> chrome</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-codepen"></i><small class="text-secondary"> codepen</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-codiepie"></i><small class="text-secondary"> codiepie</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-connectdevelop"></i><small class="text-secondary"> connectdevelop</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-contao"></i><small class="text-secondary"> contao</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-css3"></i><small class="text-secondary"> css3</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-dashcube"></i><small class="text-secondary"> dashcube</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-delicious"></i><small class="text-secondary"> delicious</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-deviantart"></i><small class="text-secondary"> deviantart</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-digg"></i><small class="text-secondary"> digg</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-dribbble"></i><small class="text-secondary"> dribbble</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-dropbox"></i><small class="text-secondary"> dropbox</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-drupal"></i><small class="text-secondary"> drupal</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-edge"></i><small class="text-secondary"> edge</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-empire"></i><small class="text-secondary"> empire</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-expeditedssl"></i><small class="text-secondary"> expeditedssl</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-facebook"></i><small class="text-secondary"> facebook</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-facebook-f"></i><small class="text-secondary"> facebook-f </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-facebook-official"></i><small class="text-secondary"> facebook-official</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-facebook-square"></i><small class="text-secondary"> facebook-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-firefox"></i><small class="text-secondary"> firefox</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-flickr"></i><small class="text-secondary"> flickr</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-fonticons"></i><small class="text-secondary"> fonticons</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-fort-awesome"></i><small class="text-secondary"> fort-awesome</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-forumbee"></i><small class="text-secondary"> forumbee</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-foursquare"></i><small class="text-secondary"> foursquare</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ge"></i><small class="text-secondary"> ge </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-get-pocket"></i><small class="text-secondary"> get-pocket</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gg"></i><small class="text-secondary"> gg</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gg-circle"></i><small class="text-secondary"> gg-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-git"></i><small class="text-secondary"> git</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-git-square"></i><small class="text-secondary"> git-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-github"></i><small class="text-secondary"> github</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-github-alt"></i><small class="text-secondary"> github-alt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-github-square"></i><small class="text-secondary"> github-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gittip"></i><small class="text-secondary"> gittip </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-google"></i><small class="text-secondary"> google</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-google-plus"></i><small class="text-secondary"> google-plus</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-google-plus-square"></i><small class="text-secondary"> google-plus-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-google-wallet"></i><small class="text-secondary"> google-wallet</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-gratipay"></i><small class="text-secondary"> gratipay</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hacker-news"></i><small class="text-secondary"> hacker-news</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-houzz"></i><small class="text-secondary"> houzz</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-html5"></i><small class="text-secondary"> html5</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-instagram"></i><small class="text-secondary"> instagram</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-internet-explorer"></i><small class="text-secondary"> internet-explorer</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ioxhost"></i><small class="text-secondary"> ioxhost</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-joomla"></i><small class="text-secondary"> joomla</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-jsfiddle"></i><small class="text-secondary"> jsfiddle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-lastfm"></i><small class="text-secondary"> lastfm</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-lastfm-square"></i><small class="text-secondary"> lastfm-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-leanpub"></i><small class="text-secondary"> leanpub</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-linkedin"></i><small class="text-secondary"> linkedin</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-linkedin-square"></i><small class="text-secondary"> linkedin-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-linux"></i><small class="text-secondary"> linux</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-maxcdn"></i><small class="text-secondary"> maxcdn</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-meanpath"></i><small class="text-secondary"> meanpath</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-medium"></i><small class="text-secondary"> medium</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-mixcloud"></i><small class="text-secondary"> mixcloud</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-modx"></i><small class="text-secondary"> modx</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-odnoklassniki"></i><small class="text-secondary"> odnoklassniki</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-odnoklassniki-square"></i><small class="text-secondary"> odnoklassniki-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-opencart"></i><small class="text-secondary"> opencart</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-openid"></i><small class="text-secondary"> openid</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-opera"></i><small class="text-secondary"> opera</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-optin-monster"></i><small class="text-secondary"> optin-monster</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pagelines"></i><small class="text-secondary"> pagelines</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-paypal"></i><small class="text-secondary"> paypal</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pied-piper"></i><small class="text-secondary"> pied-piper</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pied-piper-alt"></i><small class="text-secondary"> pied-piper-alt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pinterest"></i><small class="text-secondary"> pinterest</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pinterest-p"></i><small class="text-secondary"> pinterest-p</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-pinterest-square"></i><small class="text-secondary"> pinterest-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-product-hunt"></i><small class="text-secondary"> product-hunt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-qq"></i><small class="text-secondary"> qq</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ra"></i><small class="text-secondary"> ra </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-rebel"></i><small class="text-secondary"> rebel</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-reddit"></i><small class="text-secondary"> reddit</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-reddit-alien"></i><small class="text-secondary"> reddit-alien</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-reddit-square"></i><small class="text-secondary"> reddit-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-renren"></i><small class="text-secondary"> renren</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-safari"></i><small class="text-secondary"> safari</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-scribd"></i><small class="text-secondary"> scribd</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-sellsy"></i><small class="text-secondary"> sellsy</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-share-alt"></i><small class="text-secondary"> share-alt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-share-alt-square"></i><small class="text-secondary"> share-alt-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-shirtsinbulk"></i><small class="text-secondary"> shirtsinbulk</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-simplybuilt"></i><small class="text-secondary"> simplybuilt</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-skyatlas"></i><small class="text-secondary"> skyatlas</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-skype"></i><small class="text-secondary"> skype</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-slack"></i><small class="text-secondary"> slack</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-slideshare"></i><small class="text-secondary"> slideshare</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-soundcloud"></i><small class="text-secondary"> soundcloud</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-spotify"></i><small class="text-secondary"> spotify</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-stack-exchange"></i><small class="text-secondary"> stack-exchange</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-stack-overflow"></i><small class="text-secondary"> stack-overflow</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-steam"></i><small class="text-secondary"> steam</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-steam-square"></i><small class="text-secondary"> steam-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-stumbleupon"></i><small class="text-secondary"> stumbleupon</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-stumbleupon-circle"></i><small class="text-secondary"> stumbleupon-circle</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tencent-weibo"></i><small class="text-secondary"> tencent-weibo</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-trello"></i><small class="text-secondary"> trello</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tripadvisor"></i><small class="text-secondary"> tripadvisor</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tumblr"></i><small class="text-secondary"> tumblr</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-tumblr-square"></i><small class="text-secondary"> tumblr-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-twitch"></i><small class="text-secondary"> twitch</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-twitter"></i><small class="text-secondary"> twitter</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-twitter-square"></i><small class="text-secondary"> twitter-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-usb"></i><small class="text-secondary"> usb</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-viacoin"></i><small class="text-secondary"> viacoin</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-vimeo"></i><small class="text-secondary"> vimeo</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-vimeo-square"></i><small class="text-secondary"> vimeo-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-vine"></i><small class="text-secondary"> vine</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-vk"></i><small class="text-secondary"> vk</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-wechat"></i><small class="text-secondary"> wechat </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-weibo"></i><small class="text-secondary"> weibo</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-weixin"></i><small class="text-secondary"> weixin</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-whatsapp"></i><small class="text-secondary"> whatsapp</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-wikipedia-w"></i><small class="text-secondary"> wikipedia-w</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-windows"></i><small class="text-secondary"> windows</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-wordpress"></i><small class="text-secondary"> wordpress</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-xing"></i><small class="text-secondary"> xing</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-xing-square"></i><small class="text-secondary"> xing-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-y-combinator"></i><small class="text-secondary"> y-combinator</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-y-combinator-square"></i><small class="text-secondary"> y-combinator-square </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-yahoo"></i><small class="text-secondary"> yahoo</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-yc"></i><small class="text-secondary"> yc </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-yc-square"></i><small class="text-secondary"> yc-square </small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-yelp"></i><small class="text-secondary"> yelp</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-youtube"></i><small class="text-secondary"> youtube</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-youtube-play"></i><small class="text-secondary"> youtube-play</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-youtube-square"></i><small class="text-secondary"> youtube-square</small></a></div>

        </div>
    </section>

    <section id="medical" class="mainParts">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">医疗</a>
          </li>
        </ul>
        <div class="row fontawesome-icon-list">

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-ambulance"></i><small class="text-secondary"> ambulance</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-h-square"></i><small class="text-secondary"> h-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-heart"></i><small class="text-secondary"> heart</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-heart-o"></i><small class="text-secondary"> heart-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-heartbeat"></i><small class="text-secondary"> heartbeat</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-hospital-o"></i><small class="text-secondary"> hospital-o</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-medkit"></i><small class="text-secondary"> medkit</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-plus-square"></i><small class="text-secondary"> plus-square</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-stethoscope"></i><small class="text-secondary"> stethoscope</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-user-md"></i><small class="text-secondary"> user-md</small></a></div>

            <div class="fa-hover font-modal-sel"><a href="javascript:void(0)"
                                                    onclick="selectIconComplete($(this).find('i').attr('class').trim())"><i
                    class="fa fa-wheelchair"></i><small class="text-secondary"> wheelchair</small></a></div>

        </div>

    </section>

</div>

<style>
    .modal-body .mainParts h2.page-header {
        margin: 20px 0px 10px;
    }

    .modal-body .mainParts div.fa-hover {
        float: left;
        width: 60px;
        margin: 7px;
        overflow: hidden;
        text-align: center;
    }

    .modal-body .mainParts a i {
        display: block;
        font-size: 25px;
        color: #333;
        margin-top: 20px;
    }
    .modal-body .mainParts a{
        text-decoration: none;
    }
    .modal-body .mainParts a small {
        overflow: hidden;
        word-break: break-all;
        height: 20px;
        display: block;
    }
</style>`;

define(['component/modal','hdjs'], function (modal) {
    return function (callback) {
       let modalobj=  modal({
            title: '选择图标',
            width: '95%',
            content: tpl,
            footer: '<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>'
        });
        window.selectIconComplete = function (ico) {
            callback(ico);
            modalobj.modal('hide');
        };
    }
});
