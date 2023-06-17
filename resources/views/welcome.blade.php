<x-client-layout>
    <form class="w-full max-w-lg bg-white shadow-md shadow-gray-300 rounded-md p-6" method="POST">
        @csrf
        <div class="flex flex-wrap -mx-3">
            <div class="w-full md:w-1/2 px-3  mb-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="name">
                    الاسم
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="name" value="{{ old('name') }}" id="name" type="text" placeholder="اسم العميل">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="w-full md:w-1/2 px-3  mb-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="email">
                    البريد الالكتروني
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="email" value="{{ old('email') }}" id="email" type="text"
                    placeholder="name@example.com">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-wrap -mx-3">
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="phone">
                    رقم الهاتف
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="phone" value="{{ old('phone') }}" id="phone" type="number" placeholder="١٢٣٤٥٦٧٨٩٠">
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="second_phone">
                    رقم هاتف اخر
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="second_phone" value="{{ old('second_phone') }}" id="second_phone" type="number"
                    placeholder="١٢٣٤٥٦٧٨٩٠">
                <x-input-error :messages="$errors->get('second_phone')" class="mt-2" />
            </div>
        </div>

        {{-- Select --}}
        <div class="flex flex-wrap -mx-3 ">
            <div class="w-full md:w-1/2 px-3  mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold"
                    for="state">المحافظة</label>
                <select id="state"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="state">
                    <option selected disabled></option>
                    <option value="القاهره">القاهره</option>
                    <option value="اسكندريه">اسكندريه</option>
                    <option value="القليوبيه">القليوبيه</option>
                </select>


                <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>

            <div class="w-full md:w-1/2 px-3  mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold"
                    for="city">المنطقة</label>
                <select id="city"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="city">
                    <option selected disabled></option>
                    <option value="مصر الجديدة">مصر الجديده</option>
                    <option value="نزهه">نزهه</option>
                    <option value="ميامى">ميامى</option>
                    <option value="بحرى">بحرى</option>
                </select>


                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>
        </div>


        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3  mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="address">
                    العنوان بالتفصيل
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    name="address" value="{{ old('address') }}" id="address" type="text"
                    placeholder="رقم / شارع / علامة">
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
        </div>

        {{-- Select --}}
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3  mt-3">
                <label for="category"
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold">الفئة</label>
                <select id="category"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="category">
                    <option selected disabled></option>
                    <option value="قطاعي">قطاعي</option>
                    <option value="تجارى">تجارى</option>
                    <option value="مشروعات">مشروعات</option>
                </select>

                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>
            <div class="w-full md:w-1/2 px-3  mt-3">
                <label for="type" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">نوع
                    العميل</label>
                <select id="type"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="type">
                    <option selected disabled></option>
                    <option value="زبون بيت">زبون بيت</option>
                    <option value="منجد">منجد</option>
                    <option value="مهندس ديكور">مهندس ديكور</option>
                    <option value="معرض اثاث">معرض اثاث</option>
                    <option value="مصنع اثاث">مصنع اثاث</option>

                </select>




                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3  mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="company_name">
                    اسم المعرض / اسم المنشآة
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    name="company_name" value="{{ old('company_name') }}" id="company_name" type="text"
                    placeholder="اسم المعرض">
                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
            </div>
        </div>


        <x-primary-button class="px-12 py-4 mt-2" type='submit'>
            {{ __('حفظ') }}
        </x-primary-button>
    </form>

</x-client-layout>
