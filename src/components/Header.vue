<template>
    <div class="wrap">
        <div id="header">
            <div class="header header7">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="logo-header7">
                                <a href="index.html"><img src="images/logo7.png" alt="" /></a>	
                            </div>
                            <div class="search-form7">
                                <form>
                                    <input type="text" onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="Find amazing products" />
                                    <input type="submit" value="">
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-8 col-xs-12">
                            <div class="main-nav main-nav7">
                                <ul class="main-menu">
                                    <li class="menu-item-has-childrent current-menu-item">
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li class="menu-item-has-childrent">
                                        <a href="detail.html">featureds</a>
                                        <ul class="sub-menu sub-menu-col-2">
                                            <li><a href="accordions.html">Accordions</a></li>
                                            <li><a href="banners.html">Banners</a></li>
                                            <li><a href="banner-slider.html">Banner Slider</a></li>
                                            <li><a href="buttons.html">Buttons</a></li>
                                            <li><a href="chart-processbar.html">Chart&Processbar</a></li>
                                            <li><a href="feature-boxes.html">Featured Boxes</a></li>
                                            <li><a href="message-boxes.html">Message Boxes</a></li>
                                            <li><a href="post-slider.html">Post Slider</a></li>
                                            <li><a href="tabs-toggle.html">Tabs&Toggle</a></li>
                                            <li><a href="testimonial.html">Testimonial</a></li>
                                            <li><a href="heading-separator.html">Heading & Separator</a></li>
                                            <li><a href="teams.html">Teams</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-childrent">
                                        <a href="grid.html">Shop categories </a>
                                        <ul class="sub-menu">
                                            <li><a href="list.html">List Full</a></li>
                                            <li class="menu-item-has-childrent">
                                                <a href="grid-mr.html">Grid Right</a>
                                                <ul class="sub-menu">
                                                    <li><a href="detail.html">Detail</a></li>
                                                    <li><a href="detail-mr.html">Detail Left</a></li>
                                                    <li><a href="detail-ml.html">Detail Right</a></li>
                                                    <li><a href="list-ml.html">List Right</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="grid.html">Grid Full </a></li>
                                            <li><a href="list-mr.html">List Right</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">Blog</a></li>
                                </ul>
                                <div class="mobile-menu">
                                    <a href="#" class="show-menu"><span class="lnr lnr-indent-decrease"></span></a>
                                    <a href="#" class="hide-menu"><span class="lnr lnr-indent-increase"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="register-box">
                                <a href="#" class="link-login">Login</a>
                                <a href="#" class="link-signin">Sign In</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-cart info-cart7">
                    <a class="info-icon icon-cart" href="#"><span class="lnr lnr-cart"></span> <sup>0</sup></a>
                    <div class="inner-cart-info">
                        <h2>2 items</h2>
                        <ul class="info-list-cart">
                            <li class="item-info-cart">
                                <div class="cart-thumb">
                                    <a class="cart-thumb" href="#">
                                        <img alt="" src="images/photos/png/1.png">
                                    </a>
                                </div>	
                                <div class="wrap-cart-title">
                                    <h3 class="cart-title"><a href="#">Birch Lane Merriweather</a></h3>
                                    <div class="cart-qty"><label>Qty:</label> <span>1</span></div>
                                </div>	
                                <div class="wrap-cart-remove">
                                    <a class="remove-product" href="#"></a>
                                    <span class="cart-price">$49.99</span>
                                </div>	
                            </li>
                            <li class="item-info-cart">
                                <div class="cart-thumb">
                                    <a href="#">
                                        <img alt="" src="images/photos/png/2.png">
                                    </a>
                                </div>
                                <div class="wrap-cart-title">
                                    <h3 class="cart-title"><a href="#">Light Wall Sconce</a></h3>
                                    <div class="cart-qty"><label>Qty:</label> <span>1</span></div>
                                </div>
                                <div class="wrap-cart-remove">
                                    <a class="remove-product" href="#"></a>
                                    <span class="cart-price">$23.00</span>
                                </div>
                            </li>
                        </ul>
                        <div class="total-cart">
                            <label>Subtotal</label> <span>$72.99</span>
                        </div>
                        <div class="link-cart">
                            <a class="cart-edit" href="#">edit cart</a>
                            <a class="cart-checkout" href="#">checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
