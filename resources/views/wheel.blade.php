<x-client-layout>
    <div id="modal-canvas"
        class="top-0 left-0 bg-[#ffffffe1] absolute z-50 h-screen w-screen hidden opacity-0 transition-all duration-1000"
        x-data>
        <canvas id="my-canvas" class="absolute h-screen w-screen"></canvas>
        <div class="absolute left-1/2 top-1/2 -translate-y-1/2">
            <div class="relative -left-1/2 -top-1/2 w-full h-full text-center bg-white">
                <p class="w-full h-full text-2xl text-red-500">CONGRATULATIONS! YOU WIN</p>
                <p class="w-full h-full font-black text-5xl" x-text="$store.data.gift"></p>
                <x-surprise.cution class="w-full h-full -mt-12" x-show="$store.data.cution"></x-surprise.cution>
                <x-surprise.discount class="w-full h-full -mt-12" x-show="$store.data.discount"></x-surprise.discount>
                <x-surprise.runner class="w-full h-full -mt-12" x-show="$store.data.runner"></x-surprise.runner>
            </div>
            <a class="mt-auto" href="/">Go Home</a>
        </div>
    </div>
    <p class="text-2xl">Raaef Wheel</p>
    <p class="text-4xl text-[#d0b246] pb-8">Press to Win</p>
    <div class="relative w-60 h-60 mt-28 md:mt-0" x-data>
        <div class="absolute w-60 h-60">
            <img src="build/assets/13459.png">
        </div>
        <div id="spinner" class="absolute w-52 h-52 left-4 top-4">
            <x-wheel.background></x-wheel.background>
            <x-surprise.curtain class="absolute top-4 left-14 h-10 w-10 -rotate-[25deg]"></x-surprise.curtain>
            <x-surprise.curtain class="absolute bottom-4 right-14 h-10 w-10 -rotate-[205deg]"></x-surprise.curtain>
            <x-surprise.discount class="absolute top-4 right-14 h-10 w-10 rotate-[25deg]"></x-surprise.discount>
            <x-surprise.discount class="absolute bottom-4 left-14 h-10 w-10 rotate-[205deg]"></x-surprise.discount>
            <x-surprise.cution class="absolute top-14 left-4 h-10 w-10 rotate-[25deg]"></x-surprise.cution>
            <x-surprise.cution class="absolute bottom-14 right-4 h-10 w-10 rotate-[205deg]"></x-surprise.cution>
            <x-surprise.runner class="absolute top-14 right-4 h-10 w-10 rotate-[68deg]"></x-surprise.runner>
            <x-surprise.runner class="absolute bottom-14 left-4 h-10 w-10 rotate-[248deg]"></x-surprise.runner>
        </div>
        <div class="absolute w-16 h-16 top-[70px] left-[88px]" @click="supriseSpin()">
            <img src="build/assets/1345911.png">
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"
        integrity="sha512-f8mwTB+Bs8a5c46DEm7HQLcJuHMBaH/UFlcgyetMqqkvTcYg4g5VXsYR71b3qC82lZytjNYvBj2pf0VekA9/FQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function randomNumber(minNum, maxNum) {
            return (Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum);
        }

        function giftTime() {
            setTimeout(() => {
                document.getElementById("modal-canvas").style.display = "block";
                document.getElementById("modal-canvas").style.opacity = "1";
            }, (1000 * 8))
        }

        // gift = "done";
        function supriseSpin() {
            // console.log(gift);
            const startFrom = 92160;
            let random = randomNumber(0, 360);
            let spinWheel = new TimelineMax();
            let currentRotation,
                lastRotation = 0,
                tolerance;



            switch (true) {
                case ((random > 45) && (random <= 90)):

                    random = (startFrom + 45) + 22.5;
                    Alpine.store('data').cutionFun();
                    giftTime();
                    break;
                case ((random > 90) && (random <= 135)):

                    random = (startFrom + 90) + 22.5;
                    Alpine.store('data').runnerFun();
                    giftTime();
                    break;
                case (random < 45):
                case (random > 180 && random < 225):
                case ((random > 135) && (random <= 180)):

                    random = (startFrom + 135) + 22.5;
                    Alpine.store('data').discountFun();
                    giftTime();
                    break;
                case ((random >= 225) && (random <= 270)):

                    random = (startFrom + 225) + 22.5;
                    Alpine.store('data').cutionFun();
                    giftTime();
                    break;
                case ((random > 270) && (random <= 315)):

                    random = (startFrom + 270) + 22.5;
                    Alpine.store('data').runnerFun();
                    giftTime();
                    break;
                case (random > 315):

                    random = (startFrom + 315) + 22.5;
                    Alpine.store('data').discountFun();
                    giftTime();
                    break;

                default:
                    break;
            }

            spinWheel.to("#spinner", 8, {
                rotation: random,
                transformOrigin: "50% 50%",
                ease: "power4.out",
            });
        }
    </script>
</x-client-layout>
