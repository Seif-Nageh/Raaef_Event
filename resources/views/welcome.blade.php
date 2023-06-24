<x-client-layout>
    <form class="w-full max-w-lg bg-white shadow-md shadow-gray-300 rounded-md p-6" method="POST" x-data="data"
        x-effect="console.log(selectedTypes)">
        @csrf
        <div class="flex flex-wrap -mx-3">
            <div class="w-full md:w-1/2 px-3  mb-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="name">
                    الاسم
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
                    name="name" value="{{ old('name') }}" id="name" type="text" placeholder="اسم العميل">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="w-full md:w-1/2 px-3  mb-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="email">
                    البريد الالكتروني
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500"
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
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                    name="phone" value="{{ old('phone') }}" id="phone" type="number" placeholder="١٢٣٤٥٦٧٨٩٠">
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="second_phone">
                    رقم هاتف اخر
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
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
                    class="appearance-none bg-left block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                    name="state">
                    <option disabled></option>
                    <option selected value="القاهره">القاهره</option>
                    <option value="اسكندريه">اسكندريه</option>
                    <option value="القليوبيه">القليوبيه</option>
                </select>


                <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>

            <div class="w-full md:w-1/2 px-3  mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold"
                    for="city">المنطقة</label>
                <select id="city"
                    class="appearance-none bg-left block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                    name="city">
                    <option disabled></option>
                    <option selected value="مصر الجديدة">مصر الجديده</option>
                    <option value="نزهه">نزهه</option>
                    <option value="ميامى">ميامى</option>
                    <option value="بحرى">بحرى</option>
                </select>


                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>
        </div>


        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3  mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="address">
                    العنوان بالتفصيل
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                    name="address" value="{{ old('address') }}" id="address" type="text"
                    placeholder="رقم / شارع / علامة">
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
        </div>

        {{-- Select --}}
        <div class="flex flex-wrap -mx-3">
            <div class="w-full md:w-1/2 px-3  mt-3">
                <label for="category"
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold">الفئة</label>
                <select id="category"
                    class="appearance-none bg-left block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                    name="category" @change="getType(event)">
                    <option disabled>اختر فئة العميل</option>
                    <template x-for="(category, index) in categories" :key="category.title">
                        <option :selected="'{{ old('category') }}' == category.title || index == 0"
                            :value="category.title" x-text="category.title"></option>
                    </template>
                </select>
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>
            <div class="w-full md:w-1/2 px-3  mt-3">
                <label for="type" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">نوع
                    العميل</label>
                <select id="type"
                    class="appearance-none bg-left block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                    name="type">
                    <option disabled>أختر نوع العميل</option>
                    <option selected value="زبون بيت">زبون بيت</option>

                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 hidden" id="company_name_div">
            <div class="w-full px-3  mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="company_name">
                    اسم المعرض / اسم المنشآة
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                    name="company_name" value="{{ old('company_name') }}" id="company_name" type="text"
                    placeholder="اسم المعرض">
                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
            </div>
        </div>


        <x-primary-button class="text-lg  mt-6" type='submit'>
            {{ __('حفظ') }}
        </x-primary-button>
    </form>

    <script>
        const data = {
            categories: [{
                title: 'قطاعي',
                types: ['زبون بيت']
            }, {
                title: 'تجارى',
                types: ['معرض اثاث', 'مصنع اثاث', 'منجد', 'مهندس ديكور']
            }, {
                title: 'مشروعات',
                types: ['معرض اثاث', 'مصنع اثاث', 'منجد', 'مهندس ديكور']
            }],
            selectedTypes: []
        }

        function getType(e) {
            data.categories.forEach(category => {
                if (category.title == e.target.value) {
                    data.selectedTypes = category.types
                }
                if (e.target.value != "قطاعي") document.getElementById("company_name_div").classList.remove(
                    "hidden")
                else document.getElementById("company_name_div").classList.add(
                    "hidden")
            });
            // let typeData = `<option disabled selected>أختر نوع العميل</option>`;
            let typeData = "";
            data.selectedTypes.forEach((selectedType) => {
                typeData += `<option value='${selectedType}'>${selectedType}</option>`
            })
            document.getElementById("type").innerHTML = typeData;
        }
    </script>

</x-client-layout>
