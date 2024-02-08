<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Tailwind Css -->
    <script src="https://cdn.tailwindcss.com"></script>

    <title> {{$pageTitle}} </title>
</head>
<body>

    <!-- Header -->
    <section class="bg-blue-100/70">
        <header class="w-[90%] mx-auto h-[80px] flex justify-between items-center" >

            <!-- Logo -->
            <a href="/">
                <img src="http://127.0.0.1:8000/img/logo/logo.png" alt="Wiki Logo" width="130px" class="lg:w-[180px]" >
            </a>

            <div class="navBar flex">
                <div class="flex items-center space-x-2 xl:space-x-4">
                    <a href='/login' class='bg-[#28427B] border-2 border-[#28427B] hover:bg-[#28427B]/80 focus:bg-[#404E6C] py-[4px] lg:py-[8px] px-[15px] lg:px-[20px] rounded text-white' >Login</a>
                    <a href='/signup' class='bg-[#28427B]/80 border-2 hover:bg-[#28427B] border-[#28427B] focus:bg-[#404E6C] py-[4px] lg:py-[8px] px-[15px] lg:px-[20px] rounded text-white'>Sign Up</a>

                    <button class="w-auto h-auto" id="burgerMenu">
                        <img src="http://127.0.0.1:8000/img/icons/menu.png" alt="Burger Menu Icon" width="30px" class="lg-w-[40px]">
                    </button>
                </div>
            </div>
        </header>
    </section>

    <!-- Hero Section -->
    <section>
        <div class="w-[90%] mx-auto mt-[60px] lg:mt-[20px] m-h-[50vh]" >

            <div class="flex flex-col py-[5%] items-center">
                <h1 class="text-3xl font-[900] mb-4 text-center" >Introducing <span class="text-[#28427B] underline">INDrive</span> ! The BEST Place To Find A Taxi !!</h1>
                <h2 class="text-xl font-[500] text-center lg:flex" >Your New Transport App Is Right Here</h2>

                <div class="w-[95%] lg:w-[65%] h-[250px] bg-gray-200 mt-[25px]">
                    <img src="" alt="Hero Img" width="100%">
                </div>

                <!-- Buttons -->
                <div class="mt-8 lg:mt-4" >
                    <a href="/Wiki/Pages/wikis" class="bg-[#28427B] border-2 border-[#28427B] hover:bg-[#28427B]/80 focus:bg-[#404E6C] py-[8px] px-[8px] lg:py-[8px] lg:px-[20px] rounded text-white">Start Exploring Wikis Today</a>
                    <a href="/Wiki/Authentification/register" class="border-2 border-[#28427B] hover:bg-[#28427B]/80 hover:text-white focus:bg-[#404E6C] py-[8px] px-[8px] lg:py-[8px] lg:px-[20px] rounded text-[#28427B]">Join Us Today</a>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
