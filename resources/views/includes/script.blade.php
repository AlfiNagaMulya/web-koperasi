 
 {{-- SCript  --}}
 <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>


<script>
    var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?72521';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
  "enabled":true,
  "chatButtonSetting":{
      "backgroundColor":"#4dc247",
      "ctaText":"Hubungi kami ",
      "borderRadius":"25",
      "marginLeft":"0",
      "marginBottom":"50",
      "marginRight":"50",
      "position":"right"
  },
  "brandSetting":{
      "brandName":"Admin Lumbung Indonesia",
      "brandSubTitle":"",
      "brandImg":"",
      "welcomeText":"Hai !\n\nAda yang bisa kami bantu ?\n",
      "messageText":"Assalamualaikum.",
      "backgroundColor":"#0a5f54",
      "ctaText":"Chat Sekarang yuk",
      "borderRadius":"25",
      "autoShow":false,
      "phoneNumber":"6283829559783"
  }
};
    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
</script>