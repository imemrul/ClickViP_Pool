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

<script>
    var app = new Vue({
        el: '#app',
        data:{
            test:'Test message',
            email:'',
            error_mes_duplicate_email:null,
            submitting:false

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
                axios.get('check_email_availibility?email='+_this.email).then(function(res){
                    if(res.data === 0){
                        let email = _this.email;
                        _this.error_mes_duplicate_email = email+' already taken'
                        _this.email='';
                    }
                })
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