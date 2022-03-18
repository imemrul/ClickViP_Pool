<!-- ================== Footer  ================== -->
<footer>
    <div class="container">

        <!--footer links-->
        <div class="footer-links">
            <div class="row">
                <div class="col-sm-6 footer-left">
                    <a href="#">Sitemap</a> &nbsp; | &nbsp; <a href="#">Privacy policy</a> | &nbsp; <a href="#">Guest book</a>
                </div>
                <div class="col-sm-6 footer-right">
                    <a href="{!! url('legal-notice-disclaimer') !!}">Legal Disclaimer</a> &nbsp; | &nbsp; <a href="{!! url('about-us') !!}">About Us</a> | &nbsp; <a href="#">Help center</a>
                </div>
            </div>
        </div>

        <!--footer social-->

        <div class="footer-social">
            <div class="row">
                <div class="col-sm-12 text-center hidden">
                    <a href="#" class="footer-logo"><img src="{{ asset('public/themes/clickvipool/assets/images/logo.png')}}" alt="Alternate Text" /></a>
                </div>
                <div class="col-sm-12 icons">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-sm-12 copyright">
                    <small>Copyright &copy; 2022 &nbsp; | &nbsp; <a href="#">By Click ViP Pool</a></small>
                </div>
                <div class="col-sm-12 text-center">
                    <img src="{{ asset('public/themes/clickvipool/assets/images/logo-footer.png')}}" alt="" />
                </div>
            </div>
        </div>
    </div>
</footer>
</div> <!--/wrapper-->

<!--JS files-->
<script src="{{ asset('public/themes/clickvipool/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/themes/clickvipool/js/jquery-ui.js')}}"></script>
<script src="{{ asset('public/themes/clickvipool/js/jquery.bootstrap.js')}}"></script>
<script src="{{ asset('public/themes/clickvipool/js/jquery.magnific-popup.js')}}"></script>
<script src="{{ asset('public/themes/clickvipool/js/jquery.owl.carousel.js')}}"></script>
<script src="{!! URL::to('public/js/axios.js') !!}"></script>
<script src="{{ asset('public/themes/clickvipool/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

@yield('custom_page_script')

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
                axios.get('{!! url("check_email_availibility?email=") !!}'+_this.email).then(function(res){
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
                    axios.get('{!! url("get_available_slot") !!}/'+$('#booking_date').val()+'?pool_id='+_pool_id).then(function(res){
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