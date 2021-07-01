<template>
    <div id="content">
        <div class="product-best-sale style2">
            <div class="container">
                <div class="title-product-best-sale" style="padding-top: 5%;">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="nav-tabs-border">
                                <ul role="tablist" class="nav nav-tabs" style="display: flex; overflow-x: auto; overflow-y: hidden;}">
                                    <li>
                                        <skeleton-loader-vue
                                        :width="175"
                                        :height="38"
                                        animation="fade"
                                        />
                                    </li>
                                    <li>
                                        <skeleton-loader-vue
                                        :width="175"
                                        :height="38"
                                        animation="fade"
                                        />
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="col-md-3 col-sm-3 col-xs-12">
							<div class="filter-product">
								<a href="#" class="btn-filter style-border-left">Filter</a>
							</div>
						</div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="furniter">
                    <div class="default-directnav  home-directnav">
                        <div class="wrap-item">
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-xs-6" v-for="(item, idx) in 4" :key="idx">
                                        <div class="item-product">
                                            <div class="item-product-thumb">
                                                <a
                                                    class="product-thumb-link"
                                                    href="javascript:void(0);"
                                                    ><skeleton-loader-vue
                                                        :width="262"
                                                        :height="262"
                                                        animation="fade"
                                                /></a>
                                                <div class="product-extra-mask">
                                                    <div
                                                        class="product-extra-link"
                                                    >
                                                        <a
                                                            class="product-add-cart"
                                                            href="javascript:void(0);"
                                                            ><span
                                                                class="lnr lnr-cart"
                                                            ></span
                                                        ></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-product-info">
                                                <h3 class="title-product">
                                                    <skeleton-loader-vue
                                                        :width="262"
                                                        :height="19"
                                                        animation="fade"
                                                    />
                                                </h3>
                                                <div class="info-price">
                                                    <span
                                                        ><skeleton-loader-vue
                                                            :width="262"
                                                            :height="19"
                                                            animation="fade"
                                                    /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
