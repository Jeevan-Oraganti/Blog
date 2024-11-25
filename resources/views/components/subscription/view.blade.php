<x-layout>
    <div class="text-center mb-8 mt-20">
        <h2 class="text-3xl font-bold text-gray-800">Choose Your Plan</h2>
        <p class="text-lg text-gray-600 mt-2">Select the best plan for you. Whether you're an individual, a small team,
            or looking for a long-term solution, <br>we have something for everyone.</br>
        </p>
    </div>
    <div class="font-serif p-6 mt-20">
        <div class="container mx-auto">
            <div class="flex">

                @include('components.subscription.plan', [
                    'name' => 'Teams',
                    'price' => 499,
                    'effects' => 'bg-blue-50 transform hover:bg-blue-100 hover:shadow-lg hover:scale-105 transition-all ease-in-out duration-300',
                    'image' => 'images/team.svg'
                ])

                @include('components.subscription.plan', [
                    'name' => 'Monthly',
                    'effects' => 'bg-gray-50 transform hover:bg-gray-100 hover:shadow-lg hover:scale-105 transition-all ease-in-out duration-300',
                    'price' => 99,
                    'image' => 'images/monthly.svg'
                ])

                @include('components.subscription.plan', [
                    'name' => 'Yearly',
                    'effects' => 'bg-blue-100 transform hover:bg-blue-200 hover:shadow-lg hover:scale-105 transition-all ease-in-out duration-300',
                    'price' => 999,
                    'image' => 'images/pen-new-square-svgrepo-com.svg'
                ])

                @include('components.subscription.plan', [
                    'name' => 'Lifetime',
                    'effects' => 'bg-green-50 transform hover:bg-green-100 hover:shadow-lg hover:scale-105 transition-all ease-in-out duration-300',
                    'price' => 4999,
                    'image' => 'images/star3.svg'
                ])

            </div>
        </div>
    </div>

</x-layout>
