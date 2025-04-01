<?php

class Base
{
    protected $monPDO;

    public function __construct($pdo = null)
    {
        $this->monPDO = $pdo;
    }

    public function laPage()
    {
        $message = $this->debut_html();
        $message .= $this->faire_head();
        $message .= $this->faire_nav();
        $message .= $this->faire_body();
        $message .= $this->faire_footer();
        $message .= $this->faire_script();
        $message .= $this->fin_html();
        return $message;
    }

    public function debut_html()
    {
        $message = '<!DOCTYPE html>
                    <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">';
        return $message;
    }

    public function faire_head()
    {
        $message = '<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="style/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Police Inter -->
  <link 
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" 
    rel="stylesheet">
  <title>Polinews</title>
                    </head>
                    <body>';
        return $message;
    }

    public function faire_nav()
    {
        $message = '<header>
    <div id="logo">
      <a href="index.php"><img src="logo.png" alt="Logo" /></a>
    </div>
    <div id="header-links">
      <a href="index.php?action=videopage">On Intelligent Research</a>
      <a href="index.php?action=aboutpolinews">About Polinews</a>
      <a href="#">Press Review</a>
    </div>
    <div id="header-right">
      <div id="languages">
        <div id="language-selected">EN</div>
        <div id="language-dropdown">
          <div onclick="changeLanguage(\'FR\')">Français</div>
          <div onclick="changeLanguage(\'EN\')">Anglais</div>
          <div onclick="changeLanguage(\'VT\')">Vietnamien</div>
        </div>
      </div>
      <div><a href="index.php?action=login">Log In</a></div>
      <div id="create-account"><a href="index.php?action=register">Create account</a></div>
    </div>
  </header>';
        return $message;
    }

    public function faire_body()
    {
        $message = '';
        return $message;
    }

    public function faire_footer()
    {
        $message = '<footer class="bg-[#494949] h-[250px] w-full pt-10">
        <div>
            <div class="flex justify-between items-center px-12 py-6 gap-3 mb-4">
                <div>
                    <img src="images/logo.png" alt="logo">
                </div>

                <div class="flex gap-5 text-white">
                    <div class="flex gap-1 border-1 border-white rounded-md py-1 px-2">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 0.5C7.34784 0.5 4.8043 1.55357 2.92893 3.42893C1.05357 5.3043 0 7.84784 0 10.5C0 13.1522 1.05357 15.6957 2.92893 17.5711C4.8043 19.4464 7.34784 20.5 10 20.5C12.6522 20.5 15.1957 19.4464 17.0711 17.5711C18.9464 15.6957 20 13.1522 20 10.5C20 7.84784 18.9464 5.3043 17.0711 3.42893C15.1957 1.55357 12.6522 0.5 10 0.5ZM18.3333 7.7C18.1828 8.19274 17.9325 8.64924 17.598 9.0411C17.2635 9.43296 16.8519 9.75179 16.3889 9.97778C16.1422 9.05167 15.6864 8.19448 15.0565 7.47214C14.4266 6.7498 13.6395 6.18155 12.7556 5.81111C12.8994 5.31811 13.2096 4.89015 13.6333 4.6C13.1556 4.28889 12.5222 4.13333 12.1444 4.67778C11.5556 5.44444 12.1444 6.46667 12.3778 6.9V7.05556C11.7609 6.68136 11.2785 6.12118 11 5.45556C9.92638 5.42107 8.86441 5.68657 7.93333 6.22222C7.83668 5.59489 7.89778 4.95336 8.11111 4.35556C8.51235 4.39386 8.91684 4.3328 9.28889 4.17778C9.66094 4.02276 9.98911 3.77853 10.2444 3.46667C10.7556 2.88889 10.1 2.15556 9.58889 1.71111H9.98889C11.5015 1.70091 12.9909 2.08378 14.3111 2.82222C15.0573 3.37372 15.671 4.08486 16.1073 4.90374C16.5437 5.72263 16.7917 6.6286 16.8333 7.55556C17.1 7.55556 17.6111 6.94444 17.8444 6.53333C18.0356 6.91111 18.1985 7.3 18.3333 7.7ZM10 19.2111C7.72222 16.9 10.2778 15.0444 8.88889 13.3889C7.86667 12.4444 6.34444 13.1 5.43333 12.0222C5.27953 11.2187 5.34602 10.3886 5.62575 9.61983C5.90548 8.85106 6.38802 8.17232 7.02222 7.65556C7.6 7.16667 11.4667 6.54444 13.0444 7.9C13.9673 8.69482 14.6165 9.75998 14.9 10.9444C15.4099 10.983 15.9199 10.8709 16.3667 10.6222C16.8222 13.9333 12.8667 18.1111 10 19.2111ZM5.72222 2.82222C6.14687 2.66032 6.61335 2.64452 7.04798 2.77733C7.4826 2.91013 7.86059 3.18396 8.12222 3.55556C7.65556 3.97778 7.07778 4.25556 6.45556 4.35556C6.47853 4.02839 6.54967 3.7064 6.66667 3.4L5.72222 2.82222Z"
                                fill="white" />
                        </svg>
                        <select name="languages" id="langueges">
                            <option value="english">English</option>
                            <option value="vietnamese">Vietnam</option>
                            <option value="french">France</option>
                        </select>
                    </div>
                    <button class="bg-[#c2c2c2] px-2.5 rounded-md font-medium text-white">Create account</button>
                </div>
            </div>

            <div class="flex justify-between items-center px-12 py-6 gap-20 text-white">
                <nav>
                    <ul class="flex justify-between items-center gap-10">
                        <li><a href="index.html">About Polinews</a></li>
                        <li><a href="about_polinews.html">Legal Notices</a></li>
                        <li><a href="contact.html">Term Of Use</a></li>
                    </ul>
                </nav>
                <nav>
                    <ul class="flex justify-between items-center gap-10">
                        <li>
                            <a href="index.html">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.4143 15.3647C17.4052 15.8398 17.2553 16.3016 16.9835 16.6915C16.7117 17.0813 16.3302 17.3817 15.8875 17.5546C15.4448 17.7274 14.9607 17.7649 14.4967 17.6623C14.0326 17.5597 13.6095 17.3217 13.2809 16.9783C12.9523 16.635 12.733 16.2018 12.6509 15.7337C12.5687 15.2656 12.6274 14.7836 12.8195 14.3489C13.0116 13.9142 13.3284 13.5463 13.7298 13.2919C14.1313 13.0374 14.5992 12.9079 15.0743 12.9197C15.7056 12.9431 16.303 13.2114 16.7399 13.6679C17.1767 14.1243 17.4186 14.7329 17.4143 15.3647Z"
                                fill="white" fill-opacity="0.45" />
                            <path
                                d="M19.1441 7.84961H11.0067C10.2015 7.84961 9.42927 8.16947 8.85992 8.73882C8.29056 9.30818 7.9707 10.0804 7.9707 10.8856V19.206C7.9707 19.6047 8.04923 19.9994 8.2018 20.3678C8.35437 20.7361 8.578 21.0708 8.85992 21.3527C9.14183 21.6346 9.47651 21.8583 9.84485 22.0108C10.2132 22.1634 10.608 22.2419 11.0067 22.2419H19.1441C19.5428 22.2419 19.9375 22.1634 20.3059 22.0108C20.6742 21.8583 21.0089 21.6346 21.2908 21.3527C21.5727 21.0708 21.7964 20.7361 21.9489 20.3678C22.1015 19.9994 22.18 19.6047 22.18 19.206V10.9006C22.1816 10.5007 22.1043 10.1045 21.9524 9.73462C21.8006 9.36473 21.5773 9.02843 21.2952 8.745C21.0132 8.46158 20.678 8.23659 20.3089 8.08294C19.9397 7.92929 19.5439 7.85 19.1441 7.84961ZM15.0746 19.434C14.2691 19.4521 13.4764 19.2299 12.7977 18.7956C12.119 18.3613 11.5851 17.7346 11.2642 16.9955C10.9432 16.2565 10.8498 15.4385 10.9957 14.6461C11.1417 13.8537 11.5204 13.1227 12.0837 12.5465C12.6469 11.9703 13.369 11.575 14.1579 11.411C14.9468 11.247 15.7666 11.3217 16.5128 11.6257C17.259 11.9297 17.8977 12.4492 18.3474 13.1178C18.7971 13.7864 19.0374 14.5738 19.0376 15.3795C19.0441 15.9061 18.9467 16.4288 18.751 16.9177C18.5553 17.4066 18.2651 17.8521 17.897 18.2287C17.5289 18.6053 17.0901 18.9056 16.6058 19.1124C16.1215 19.3192 15.6012 19.4285 15.0746 19.434ZM19.4786 11.3266C19.3796 11.3266 19.2816 11.3069 19.1903 11.2685C19.0991 11.2302 19.0164 11.1741 18.9471 11.1034C18.8778 11.0327 18.8233 10.9489 18.7868 10.8569C18.7503 10.7649 18.7326 10.6665 18.7346 10.5676C18.7346 10.3663 18.8145 10.1732 18.9569 10.0309C19.0992 9.88855 19.2923 9.80858 19.4936 9.80858C19.6949 9.80858 19.8879 9.88855 20.0302 10.0309C20.1726 10.1732 20.2526 10.3663 20.2526 10.5676C20.2555 10.6747 20.2353 10.7813 20.1933 10.8799C20.1513 10.9785 20.0885 11.0669 20.0091 11.1389C19.9298 11.211 19.8358 11.2651 19.7336 11.2975C19.6314 11.3299 19.5234 11.3398 19.4171 11.3266H19.4786Z"
                                fill="white" fill-opacity="0.45" />
                            <path
                                d="M15.075 0.000187759C11.0968 -0.0197032 7.27364 1.54155 4.44656 4.3405C1.61949 7.13944 0.0200787 10.9468 0.000187759 14.925C-0.0197032 18.9032 1.54155 22.7264 4.3405 25.5534C7.13944 28.3805 10.9468 29.9799 14.925 29.9998C16.8948 30.0097 18.8473 29.6314 20.6709 28.8867C22.4945 28.142 24.1536 27.0454 25.5534 25.6595C26.9533 24.2736 28.0664 22.6256 28.8293 20.8095C29.5922 18.9934 29.99 17.0448 29.9998 15.075C30.0097 13.1052 29.6314 11.1527 28.8867 9.32911C28.142 7.50548 27.0454 5.84639 25.6595 4.44656C24.2736 3.04674 22.6256 1.93359 20.8095 1.17068C18.9934 0.407771 17.0448 0.0100368 15.075 0.000187759ZM24.1844 19.0529C24.1886 19.7259 24.0591 20.393 23.8036 21.0155C23.548 21.6381 23.1714 22.2037 22.6957 22.6796C22.2199 23.1555 21.6544 23.5323 21.0319 23.788C20.4094 24.0437 19.7424 24.1734 19.0695 24.1694H11.0835C10.4106 24.1736 9.74353 24.0441 9.12099 23.7886C8.49844 23.533 7.93282 23.1564 7.45689 22.6807C6.98097 22.2049 6.60423 21.6394 6.3485 21.0169C6.09276 20.3944 5.96313 19.7274 5.96711 19.0544V11.067C5.96293 10.3941 6.09237 9.72703 6.34792 9.10449C6.60347 8.48194 6.98005 7.91632 7.45583 7.4404C7.93161 6.96448 8.49713 6.58773 9.1196 6.332C9.74207 6.07626 10.4091 5.94663 11.082 5.95061H19.0695C19.7423 5.94663 20.4092 6.07622 21.0316 6.33186C21.6539 6.5875 22.2194 6.96411 22.6951 7.43987C23.1709 7.91563 23.5475 8.48108 23.8031 9.10345C24.0588 9.72582 24.1884 10.3927 24.1844 11.0655V19.0529Z"
                                fill="white" fill-opacity="0.45" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="about_polinews.html">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15 0C12.0333 0 9.13319 0.879734 6.66645 2.52796C4.19972 4.17618 2.27713 6.51885 1.14181 9.25974C0.00649926 12.0006 -0.290551 15.0166 0.288228 17.9263C0.867006 20.8361 2.29562 23.5088 4.3934 25.6066C6.49119 27.7044 9.16394 29.133 12.0737 29.7118C14.9834 30.2905 17.9994 29.9935 20.7403 28.8582C23.4811 27.7229 25.8238 25.8003 27.472 23.3335C29.1203 20.8668 30 17.9667 30 15C29.996 11.023 28.4144 7.20997 25.6022 4.39778C22.79 1.5856 18.977 0.00397107 15 0ZM23.9085 11.5695V12.5385C23.9085 12.6127 23.8937 12.6861 23.8649 12.7544C23.836 12.8227 23.7938 12.8846 23.7407 12.9363C23.6875 12.9881 23.6246 13.0286 23.5555 13.0556C23.4864 13.0826 23.4126 13.0955 23.3385 13.0935C21.7547 12.9816 20.2396 12.4033 18.984 11.4315V18.5235C18.9837 19.3084 18.827 20.0854 18.5231 20.8091C18.2192 21.5328 17.7741 22.1887 17.214 22.7385C16.6493 23.3027 15.9776 23.7485 15.2384 24.0499C14.4992 24.3512 13.7072 24.5021 12.909 24.4935C11.3038 24.4912 9.76313 23.8613 8.616 22.7385C7.88609 22.0026 7.36035 21.0893 7.0905 20.0886C6.82065 19.0878 6.816 18.0341 7.07701 17.031C7.31551 16.068 7.79701 15.183 8.47651 14.4615C8.98325 13.8421 9.62201 13.3438 10.3461 13.0031C11.0702 12.6623 11.8613 12.4877 12.6615 12.492H13.8915V15.0465C13.892 15.1207 13.8768 15.1941 13.8467 15.262C13.8166 15.3298 13.7724 15.3904 13.7171 15.4398C13.6617 15.4892 13.5965 15.5262 13.5257 15.5484C13.4549 15.5706 13.3802 15.5775 13.3065 15.5685C12.5923 15.354 11.8228 15.4251 11.1601 15.767C10.4973 16.1088 9.99322 16.6946 9.75397 17.4008C9.51472 18.1071 9.55904 18.8786 9.87758 19.5529C10.1961 20.2271 10.764 20.7513 11.4615 21.015C11.8665 21.2475 12.3195 21.384 12.7845 21.4155C13.1445 21.4305 13.5045 21.3855 13.8465 21.2775C14.4174 21.0849 14.9141 20.7189 15.2671 20.2306C15.6201 19.7423 15.812 19.156 15.816 18.5535V5.631C15.816 5.48804 15.8727 5.35092 15.9736 5.24969C16.0746 5.14846 16.2115 5.0914 16.3545 5.091H18.477C18.6149 5.09117 18.7475 5.1441 18.8477 5.23893C18.9478 5.33376 19.0078 5.4633 19.0155 5.601C19.0929 6.26284 19.3031 6.90225 19.6335 7.4809C19.9639 8.05955 20.4078 8.56552 20.9385 8.9685C21.6556 9.50683 22.5074 9.83694 23.4 9.9225C23.5337 9.93393 23.6587 9.99342 23.7519 10.0899C23.8452 10.1865 23.9002 10.3135 23.907 10.4475L23.9085 11.5695Z"
                                        fill="white" fill-opacity="0.45" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M31 16C31 24.2845 24.2845 31 16 31C7.7155 31 1 24.2845 1 16C1 7.7155 7.7155 1 16 1C24.2845 1 31 7.7155 31 16Z"
                                        fill="white" fill-opacity="0.45" stroke="white" stroke-opacity="0.45" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M8.5 23.5L14.791 17.2105M14.791 17.2105L8.5 8.5H12.6655L17.2105 14.791L23.5 8.5M14.791 17.2105L19.333 23.5H23.5L17.209 14.7895"
                                        stroke="#494949" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>';
        return $message;
    }
    
    public function faire_script()
    {
        $message = '
        <script>
        // Menu des langues
  document.getElementById("language-selected").addEventListener("click", function() {
      let dropdown = document.getElementById("language-dropdown");
      dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    });

    function changeLanguage(lang) {
      document.getElementById("language-selected").innerText = lang;
      document.getElementById("language-dropdown").style.display = "none";
    }

    document.addEventListener("click", function(event) {
      let languages = document.getElementById("languages");
      if (!languages.contains(event.target)) {
        document.getElementById("language-dropdown").style.display = "none";
      }
    });
    
     /* ---- SECTION CATEGORIE ---- */
  const carousel = document.querySelector(".carousel");
  const leftBtn = document.querySelector(".left-btn");
  const rightBtn = document.querySelector(".right-btn");

  let scrollAmount = 0;
  const scrollStep = 160;

  leftBtn.addEventListener("click", () => {
    scrollAmount = Math.max(scrollAmount - scrollStep, 0);
    carousel.style.transform = `translateX(-${scrollAmount}px)`;
  });

  rightBtn.addEventListener("click", () => {
    const maxScroll = carousel.scrollWidth - carousel.clientWidth;
    scrollAmount = Math.min(scrollAmount + scrollStep, maxScroll);
    carousel.style.transform = `translateX(-${scrollAmount}px)`;
  });

  // Défilement automatique du carrousel toutes les 2 secondes
  setInterval(() => {
    const maxScroll = carousel.scrollWidth - carousel.clientWidth;
    if (scrollAmount < maxScroll) {
      scrollAmount = Math.min(scrollAmount + scrollStep, maxScroll);
    } else {
      scrollAmount = 0; // revient au début
    }
    carousel.style.transform = `translateX(-${scrollAmount}px)`;
  }, 2000);

   $(document).ready(function () {
            // Lưu vị trí và kích thước ban đầu
            var originalPos = {};
            var isEnlarged = false;
            var $activeElement = null;
            var $imgContainer = $("#img_container");
            var $smallImgContainer = $("#small_img_container");
            var $overlay = $("#overlay");

            // Hàm xử lý phóng to ảnh
            function enlargeImage($element) {
                if (!isEnlarged) {
                    // Lưu vị trí và kích thước ban đầu nếu chưa được lưu
                    var offset = $element.offset();
                    originalPos = {
                        width: $element.width(),
                        height: $element.height(),
                        position: $element.css("position"),
                        top: offset.top,
                        left: offset.left,
                        zIndex: $element.css("zIndex")
                    };

                    // Hiển thị overlay
                    $overlay.fadeIn(300);

                    // Phóng to ảnh và đưa lên trên overlay
                    $element.css({
                        "position": "fixed",
                        "z-index": 1001
                    }).animate({
                        top: "50%",
                        left: "50%",
                        marginTop: "-250px",
                        marginLeft: "-250px",
                        height: "500px",
                        width: "700px"
                    }, 1500, "easeOutCubic");

                    $activeElement = $element;
                    isEnlarged = true;
                }
            }

            // Xử lý click trên container lớn
            $imgContainer.click(function () {
                enlargeImage($(this));
            });

            // Xử lý click trên container nhỏ
            $smallImgContainer.click(function () {
                enlargeImage($(this));
            });

            // Xử lý sự kiện click vào overlay để đóng ảnh phóng to
            $overlay.click(function () {
                if (isEnlarged && $activeElement) {
                    // Xác định vị trí đích để trở về
                    var finalTop = originalPos.top;
                    var finalLeft = originalPos.left;
                    if (originalPos.position !== "fixed") {
                        // Điều chỉnh vị trí theo cuộn trang
                        finalTop = originalPos.top - $(window).scrollTop();
                        finalLeft = originalPos.left - $(window).scrollLeft();
                    }

                    // Animate tất cả thuộc tính cùng một lúc
                    $activeElement.animate({
                        top: finalTop + "px",
                        left: finalLeft + "px",
                        width: originalPos.width,
                        height: originalPos.height,
                        marginTop: 0,
                        marginLeft: 0
                    }, 500, "easeInOutQuad", function () {
                        // Khôi phục các thuộc tính không thể animate
                        $(this).css({
                            "position": originalPos.position,
                            "z-index": originalPos.zIndex
                        });

                        // Ẩn overlay sau khi animation hoàn thành
                        $overlay.fadeOut(300);
                    });

                    $activeElement = null;
                    isEnlarged = false;
                }
            });
        });

        // Thêm easing functions nếu chưa có
        $.extend($.easing, {
            easeOutCubic: function (x, t, b, c, d) {
                return c * ((t = t / d - 1) * t * t + 1) + b;
            },
            easeInOutQuad: function (x, t, b, c, d) {
                if ((t /= d / 2) < 1) return c / 2 * t * t + b;
                return -c / 2 * ((--t) * (t - 2) - 1) + b;
            }
        });
  </script>';
        return $message;
    }
    
    public function fin_html()
    {
        return "</body>
                </html>";
    }

    public function __toString()
    {
        return $this->laPage();
    }
}
?>
