{{--<x-layout>--}}
{{--    <div class="text-center mb-8 mt-20">--}}
{{--        <h2 class="text-3xl font-bold text-gray-800">Choose Your Plan</h2>--}}
{{--        <p class="text-lg text-gray-600 mt-2">Select the best plan for you. Whether you're an individual, a small team,--}}
{{--            or looking for a long-term solution, <br>we have something for everyone.</br>--}}
{{--        </p>--}}
{{--    </div>--}}
{{--    <div class="font-serif p-6 mt-20">--}}
{{--        <div class="container mx-auto">--}}
{{--            <div class="flex">--}}

{{--                @include('components.subscription.plan', [--}}
{{--                    'name' => 'Teams',--}}
{{--                    'price' => 499,--}}
{{--                    'effects' => 'bg-blue-50 transform hover:bg-blue-100 hover:shadow-lg hover:scale-105 transition-all ease-in-out duration-300',--}}
{{--                    'image' => 'images/team.svg',--}}
{{--                    'excerpt' => 'Perfect for growing teams. Collaborate and scale efficiently with powerful features.'--}}
{{--                ])--}}

{{--                @include('components.subscription.plan', [--}}
{{--                    'name' => 'Monthly',--}}
{{--                    'effects' => 'bg-gray-50 transform hover:bg-gray-100 hover:shadow-lg hover:scale-105 transition-all ease-in-out duration-300',--}}
{{--                    'price' => 99,--}}
{{--                    'image' => 'images/pen-new-square-svgrepo-com.svg',--}}
{{--                    'excerpt' => 'Pay month-to-month. No long-term commitment, cancel anytime.'--}}
{{--                ])--}}

{{--                @include('components.subscription.plan', [--}}
{{--                    'name' => 'Yearly',--}}
{{--                    'effects' => 'bg-blue-100 transform hover:bg-blue-200 hover:shadow-lg hover:scale-105 transition-all ease-in-out duration-300',--}}
{{--                    'price' => 999,--}}
{{--                    'image' => 'images/monthly.svg',--}}
{{--                    'excerpt' => 'Save more with our yearly plan. Get access to all features with a discounted rate.'--}}
{{--                ])--}}

{{--                @include('components.subscription.plan', [--}}
{{--                    'name' => 'Lifetime',--}}
{{--                    'effects' => 'bg-green-50 transform hover:bg-green-100 hover:shadow-lg hover:scale-105 transition-all ease-in-out duration-300',--}}
{{--                    'price' => 3999,--}}
{{--                    'original_price' => 5999,--}}
{{--                    'image' => 'images/star3.svg',--}}
{{--                    'excerpt' => 'One-time payment for lifetime access. No recurring fees and unlimited usage.'--}}
{{--                ])--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-layout>--}}

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div id="root">
    <input type="text" id="input" v-model="message">

    <p>The value of the input is: @{{ message }}</p>
</div>

<script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script>

<script>
    import Vue from "vue";

    new Vue({
        el: '#root',
        data: {
            message: 'Hello World'
        }
    });
</script>

</body>
</html>
