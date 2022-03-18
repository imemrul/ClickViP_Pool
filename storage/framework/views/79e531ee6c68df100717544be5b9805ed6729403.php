</div> <!--/wrapper-->

<!--JS files-->
<script src="<?php echo e(asset('public/themes/clickvipool/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/themes/clickvipool/js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('public/themes/clickvipool/js/jquery.bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('public/themes/clickvipool/js/jquery.magnific-popup.js')); ?>"></script>
<script src="<?php echo e(asset('public/themes/clickvipool/js/jquery.owl.carousel.js')); ?>"></script>
<script src="<?php echo URL::to('public/js/axios.js'); ?>"></script>
<script src="<?php echo e(asset('public/themes/clickvipool/js/main.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

<?php echo $__env->yieldContent('custom_page_script'); ?>

<script>
    var app = new Vue({
        el: '#app',
        data:{
            test:'Test message',
            email:'',
            error_mes_duplicate_email:null,
            submitting:false,
            booking_date:null,
            available_time_slot:[],
            mes_for_available_time_slot:'Please select a date first'

        },
        methods:{
            setSubmitting:function(){
                console.log('Here it is')
                // if(this.error_mes_duplicate_email == null){
                //     this.submitting = true;
                // }else{
                //     this.submitting = false;
                // }
            },
            checkEmailAvailibility:function(){
                let _this = this;
                _this.error_mes_duplicate_email = null;
                axios.get('<?php echo url("check_email_availibility?email="); ?>'+_this.email).then(function(res){
                    if(res.data === 0){
                        let email = _this.email;
                        _this.error_mes_duplicate_email = email+' already taken'
                        _this.email='';
                    }
                })
            },
            calendar_input_for_booking:function (_pool_id) {
                //console.log($('#booking_date').val())
                setTimeout(function(){
                    var _this = this;
                    this.mes_for_available_time_slot = 'Please wait....'
                    axios.get('<?php echo url("get_available_slot"); ?>/'+$('#booking_date').val()+'?pool_id='+_pool_id).then(function(res){
                        //console.log(res.data);
                        app.available_time_slot = res.data;
                        if(res.data.length == 0){
                            app.mes_for_available_time_slot = 'Time slot is not available of this date. Select another'
                        }else{
                            app.mes_for_available_time_slot = '';
                        }
                    })
                },300)
            },
            check_available_slot_status:function (_status) {
                if(_status === 'Available'){
                    return 'shadow_for_available_slot';
                }else if(_status === 'Reserved'){
                    return 'shadow_for_reserved_slot'
                }else{
                    return 'shadow_for_booked_slot';
                }
            }
        }
    })



    $('button.saveChange').click(function(){
        if (!$('form')[0].checkValidity()) {
            $('form').find('input[type="submit"]').click();
            return false;
        }
    });

    var success_message_element = $('#success_message');
    if(success_message_element.length > 0){
        setTimeout(function(){
            success_message_element.hide(500)
        },5000)
    }
</script>




</body>

</html>