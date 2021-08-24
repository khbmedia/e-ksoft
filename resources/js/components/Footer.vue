<template>
    <div>
        <div id="footer">
		<div class="footer footer-dark">
			<div class="container">
				<div class="footer-bottom">
					<div class="row">
						<div class="col-md-9 col-sm-9 col-xs-12">
							<div class="menu-footer">
								<div class="top-left">
                                    <div class="logo-header7">
                                        <a href="javascript:;" @click="changeComponent('ListItem')"><img src="/images/logo-color.svg" width="100px" height="50px" alt="" /></a>	
                                    </div>
                                </div>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="copyright">
								<p>Copyright @ <a href="#">E-KSOFT.com</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    </div>
</template>
<script>
export default{
methods:{
	changeComponent(component){
     this.$router.push('/?tenancy=momo'); 
      
    },
}
}
</script>
