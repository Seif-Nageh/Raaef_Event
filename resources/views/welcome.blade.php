<x-client-layout>
    <form class="w-full max-w-lg bg-white shadow-md shadow-gray-300 rounded-md p-6" method="POST" x-data="data">
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
                    name="state" @change="getArea(event.target.value)">
                    <option disabled>أختر المحافظة</option>
                    <template x-for="(state, index) in governorates" :key="state.name">
                        <option :selected="'{{ old('state') }}' == state.name || index == 0" :value="state.name"
                            x-text="state.name"></option>
                    </template>
                </select>


                <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>

            <div class="w-full md:w-1/2 px-3  mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold"
                    for="city">المنطقة</label>
                <select id="city"
                    class="appearance-none bg-left block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                    name="city">
                    <option disabled>أختر المنطقة</option>
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
                    name="category" @change="getType(event.target.value)">
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
                    {{-- <option selected value="زبون بيت">زبون بيت</option> --}}

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
            governorates: [{
                    name: 'القاهرة',
                    areas: [
                        'المعادي',
                        'حلوان',
                        'الزمالك',
                        'المهندسين',
                        'الدقي',
                        'العجوزة',
                        'الجيزة',
                        'مدينة نصر',
                        'مصر الجديدة',
                        'التجمع الخامس',
                        'الشيخ زايد',
                        'الهرم',
                        'العباسية',
                        'الساحل الشمالي',
                        'شبرا',
                        'روض الفرج',
                        'مدينة الشروق',
                        'المرج',
                        'عين شمس',
                        'حدائق القبة',
                        'المطرية',
                        'الزيتون',
                        'الوايلي',
                        'مصر القديمة',
                        'بولاق',
                        'منشأة ناصر',
                        'البساتين',
                        'الشرابية',
                        'دار السلام',
                        'القليوبية'
                    ]
                },
                {
                    name: 'الجيزة',
                    areas: [
                        'الهرم',
                        'العجوزة',
                        'الدقي',
                        'الدوراني',
                        'الوراق',
                        'أكتوبر',
                        'الشيخ زايد',
                        'البدرشين',
                        'صفط اللبن',
                        'العياط',
                        'الصف',
                        'الحوامدية',
                        'العشراوي',
                        'المنيب',
                        'الجمالية',
                        'الحرفيين',
                        'كرداسة',
                        'أبو النمرس',
                        'بولاق الدكرور',
                        'العمرانية',
                        'الصفا والمروة',
                        'البيت الوطني',
                        'منشأة القناطر',
                        'منشأة الكرامة',
                        'الباويطي',
                        'أطفيح',
                        'أبو رواش'
                    ]
                },
                {
                    name: 'الإسكندرية',
                    areas: [
                        'محرم بك',
                        'العطارين',
                        'السيوف',
                        'كليوباترا',
                        'فلمنج',
                        'الشاطبي',
                        'أبيس',
                        'المنتزه',
                        'العصافرة',
                        'اللبان',
                        'السانت تريز',
                        'سموحة',
                        'الرمل',
                        'سبورتنج',
                        'العجمي',
                        'ميامي',
                        'المندرة',
                        'المعمورة',
                        'الشاطبي',
                        'سيدي جابر',
                        'الإبراهيمية',
                        'برج العرب'
                    ]
                },
                {
                    name: 'الشرقية',
                    areas: ['الزقازيق', 'بلبيس', 'العاشر من رمضان', 'منيا القمح', 'أبو حماد']
                },
                {
                    name: 'القليوبية',
                    areas: ['بنها', 'قليوب', 'شبرا الخيمة', 'القناطر الخيرية', 'الخانكة']
                },
                {
                    name: 'الغربية',
                    areas: ['طنطا', 'المحلة الكبرى', 'كفر الزيات', 'زفتى', 'السنطة']
                },
                {
                    name: 'المنوفية',
                    areas: ['شبين الكوم', 'مدينة السادات', 'منوف', 'سرس الليان', 'تلا']
                },
                {
                    name: 'الدقهلية',
                    areas: ['المنصورة', 'طلخا', 'المطرية', 'أجا', 'منية النصر']
                },
                {
                    name: 'كفر الشيخ',
                    areas: ['كفر الشيخ', 'دسوق', 'كوم حمادة', 'بلطيم', 'سيدي سالم']
                },
                {
                    name: 'المنيا',
                    areas: ['المنيا', 'المنيا الجديدة', 'أبو قرقاص', 'مطاي', 'ملوي']
                },
                {
                    name: 'أسيوط',
                    areas: ['أسيوط', 'أسيوط الجديدة', 'ديروط', 'منفلوط', 'أبنوب']
                },
                {
                    name: 'سوهاج',
                    areas: ['سوهاج', 'سوهاج الجديدة', 'أخميم', 'أخميم الجديدة', 'البلينا']
                },
                {
                    name: 'قنا',
                    areas: ['قنا', 'قنا الجديدة', 'أبو تشت', 'نجع حمادي', 'دشنا']
                },
                {
                    name: 'الأقصر',
                    areas: ['الأقصر', 'الأقصر الجديدة', 'الأقصر الغربية', 'العديسات', 'أرمنت']
                },
                {
                    name: 'أسوان',
                    areas: ['أسوان', 'أسوان الجديدة', 'دراو', 'كوم أمبو', 'نصر النوبة']
                },
                {
                    name: 'البحر الأحمر',
                    areas: ['الغردقة', 'مرسى علم', 'القصير', 'سفاجا', 'رأس غارب']
                },
                {
                    name: 'السويس',
                    areas: ['السويس', 'العين السخنة', 'الجناين', 'العتبة', 'الزيتيات']
                },
                {
                    name: 'مطروح',
                    areas: ['مرسى مطروح', 'العلمين', 'الحمام', 'الضبعة', 'سيوة']
                },
                {
                    name: 'شمال سيناء',
                    areas: ['العريش', 'رفح', 'بئر العبد', 'الشيخ زويد', 'نخل']
                },
                {
                    name: 'جنوب سيناء',
                    areas: ['شرم الشيخ', 'دهب', 'نويبع', 'طابا', 'سانت كاترين']
                },
                {
                    name: 'بني سويف',
                    areas: ['بني سويف', 'بني سويف الجديدة', 'الواسطى', 'ناصر', 'إهناسيا']
                },
                {
                    name: 'الفيوم',
                    areas: ['الفيوم', 'الفيوم الجديدة', 'طامية', 'سنورس', 'إطسا']
                },
            ],
        }

        function getType(e) {
            // let typeData = "";
            let typeData = `<option disabled selected>أختر نوع العميل</option>`;
            data.categories.forEach(category => {
                if (category.title == e) {
                    category.types.forEach((type, index) => {
                        if (index == 0)
                            typeData += `<option selected value='${type}'>${type}</option>`
                        else
                            typeData += `<option value='${type}'>${type}</option>`
                    })
                }
                if (e != "قطاعي") document.getElementById("company_name_div").classList.remove(
                    "hidden")
                else document.getElementById("company_name_div").classList.add(
                    "hidden")
            });
            document.getElementById("type").innerHTML = typeData;
        }

        function getArea(e) {
            // let typeData = "";
            let typeData = `<option disabled selected>أختر المنطقة</option>`;
            data.governorates.forEach(governorate => {
                if (governorate.name == e) {
                    governorate.areas.forEach((area, index) => {
                        if (index == 0)
                            typeData += `<option selected value='${area}'>${area}</option>`
                        else
                            typeData += `<option value='${area}'>${area}</option>`
                    })
                }
            });
            document.getElementById("city").innerHTML = typeData;
        }
        window.addEventListener("load", () => {
            getType(document.getElementById("category").value);
            getArea(document.getElementById("state").value);
        });
    </script>

</x-client-layout>
