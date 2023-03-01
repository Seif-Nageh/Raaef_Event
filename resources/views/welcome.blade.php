<x-client-layout>
    <form class="w-full max-w-lg bg-white shadow-md shadow-gray-300 rounded-md p-6" method="POST">
        @csrf
        <div class="flex flex-wrap -mx-3">
            <div class="w-full md:w-1/2 px-3  mb-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="name">
                    Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="name" value="{{ old('name') }}"
                    id="name" type="text" placeholder="Client Name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="phone">
                    Phone Number
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="phone" value="{{ old('phone') }}"
                    id="phone" type="number" placeholder="01234567890">
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3  mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="e-mail">
                    E-mail
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="email" value="{{ old('email') }}"
                    id="e-mail" type="text" placeholder="name@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full md:w-1/2 px-3  mb-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="city">
                    City
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="city" value="{{ old('city') }}"
                    id="city" type="text" placeholder="Cairo">
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>
                <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="state">
                    State
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="state" value="{{ old('state') }}"
                    id="state" type="text" placeholder="Nasr city">
                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>
        </div>
        <x-primary-button class="px-10 py-4 mt-2">
            {{ __('submit') }}
        </x-primary-button>
    </form>

</x-client-layout>
