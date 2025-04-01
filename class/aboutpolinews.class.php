<?php

class aboutpolinews extends Base
{
     public $monPDO;

     public function faire_head()
    {
        $message = '<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/output.css">
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

    public function faire_body()
    {
        $message = '<div class="container min-w-full mb-20">
        <div class="py-12 px-12 min-w-full">
            <div class="flex justify-between items-center px-8 py-6 gap-3 mb-4">
                <div class="max-w-[575px] h-[256px]">
                    <h2 class="text-3xl font-bold">Information tailored to your needs</h2>
                    <br>
                    <p class="text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. t
                        enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                    </p>
                </div>
                <div class="mb-32">
                    <div class="w-[550px] h-[331px] border-solid border-black border-2 rounded-4xl" id="img_container">
                        <img src="" alt="">
                    </div>
                    <div class="w-[320px] h-[257px] bg-[#D9D9D9] rounded-4xl absolute top-[35%] left-[50%]" id="small_img_container">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-[#D9D9D9] rounded-4xl py-10 px-20 min-w-full">
            <div class="min-w-full text-center mb-8">
                <h2 class="text-3xl font-bold">Our core values</h2>
            </div>
            <div class="flex justify-between gap-4 mt-5">
                <div class="w-[280px] text-justify">
                    <h3 class="font-bold mb-4">Title</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam
                    </p>
                </div>

                <div class="w-[280px] text-justify">
                    <h3 class="font-bold mb-4">Title</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam
                    </p>
                </div>


                <div class="w-[280px] text-justify">
                    <h3 class="font-bold mb-4">Title</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam
                    </p>
                </div>
            </div>
        </div>


        <div class="p-16">
            <div class="flex justify-between gap-6 mb-16">
                <div class="grid grid-flow-col grid-rows-3 gap-8">
                    <div class="w-[180px] bg-[#3056fd] rounded-4xl row-span-2 row-start-2">
                        <img src="" alt="">
                    </div>
                    
                    <div class="w-[180px] h-[460px] bg-[#57d641] rounded-4xl row-start-1 row-end-4">
                        <img src="" alt="">
                    </div>

                    <div class="w-[180px] bg-[#df4141] rounded-4xl row-span-2 row-end-3">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="max-w-[575px] h-[256px]">
                    <h2 class="text-3xl font-bold">Information tailored to your needs</h2>
                    <br>
                    <p class="text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. t
                        enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                    </p>
                </div>
            </div>

            <div class="px-10 flex justify-between items-center min-w-full">
                <div class="border-2 border-black rounded-4xl h-[350px] w-[350px] p-10">
                    <div class="rounded-full bg-[#C9C9C9] w-20 h-20 mb-2"></div>
                    <div>
                        <div class="font-bold mb-2">
                            <h3 class="text-lg">Prénom Nom</h3>
                            <h4 class="text-sm">Profession</h4>
                        </div>
                        <p class="text-justify text-sm">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat.
                        </p>
                    </div>
                </div>    
                
                <div class="border-2 border-black rounded-4xl h-[350px] w-[350px] p-10">
                    <div class="rounded-full bg-[#C9C9C9] w-20 h-20 mb-2"></div>
                    <div>
                        <div class="font-bold mb-2">
                            <h3 class="text-lg">Prénom Nom</h3>
                            <h4 class="text-sm">Profession</h4>
                        </div>
                        <p class="text-justify text-sm">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                            ea
                            commodo consequat.
                        </p>
                    </div>
                </div>


                <div class="border-2 border-black rounded-4xl h-[350px] w-[350px] p-10">
                    <div class="rounded-full bg-[#C9C9C9] w-20 h-20 mb-2"></div>
                    <div>
                        <div class="font-bold mb-2">
                            <h3 class="text-lg">Prénom Nom</h3>
                            <h4 class="text-sm">Profession</h4>
                        </div>
                        <p class="text-justify text-sm">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                            ea
                            commodo consequat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  ';
        return $message;
    }
    
public function __toString()
    {
        return $this->laPage();
    }
}
?>
