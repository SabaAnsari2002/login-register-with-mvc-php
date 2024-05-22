<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ثبت نام</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/persian-datepicker@1.0.0/dist/css/persian-datepicker.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        body {
            direction: rtl;
            font-family: 'Tahoma', 'Arial', sans-serif;
        }
        .form-group label, .form-check-label {
            float: right;
        }
        .error {
            color: red;
            margin-top: 5px;
            text-align: right;
        }
        .hidden {
            display: none;
        }
        .form-control, .form-check-input {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>فرم ثبت نام</h2>
        <?php echo form_open('controllerForm/submit_form', ['id' => 'registrationForm']); ?>
            <div class="form-group">
                <label for="first_name">نام</label>
                <input type="text" class="form-control" name="first_name" id="first_name">
                <div class="error"><?php echo form_error('first_name'); ?></div>
            </div>
            <div class="form-group">
                <label for="last_name">نام خانوادگی</label>
                <input type="text" class="form-control" name="last_name" id="last_name">
                <div class="error"><?php echo form_error('last_name'); ?></div>
            </div>
            <div class="form-group">
                <label for="national_id">کد ملی</label>
                <input type="text" class="form-control" name="national_id" id="national_id">
                <div class="error"><?php echo form_error('national_id'); ?></div>
            </div>
            <div class="form-group">
                <label for="birth_date">تاریخ تولد</label>
                <input type="text" class="form-control" name="birth_date" id="birth_date">
                <div class="error"><?php echo form_error('birth_date'); ?></div>
            </div>
            <div class="form-group">
                <label for="phone_number">شماره همراه</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number">
                <div class="error"><?php echo form_error('phone_number'); ?></div>
            </div>
            <div class="form-group">
                <label for="education_level">مقطع تحصیلی</label>
                <select class="form-control" name="education_level" id="education_level">
                    <option value="">انتخاب کنید</option>
                    <option value="کاردانی به کارشناسی">کاردانی به کارشناسی</option>
                    <option value="کارشناسی">کارشناسی</option>
                    <option value="کارشناسی به کارشناسی ارشد">کارشناسی به کارشناسی ارشد</option>
                    <option value="کارشناسی ارشد به دکترا">کارشناسی ارشد به دکترا</option>
                </select>
                <div class="error"><?php echo form_error('education_level'); ?></div>
            </div>
            <div class="form-group">
                <label for="university">دانشگاه پذیرفته شده</label>
                <input type="text" class="form-control" name="university" id="university">
                <div class="error"><?php echo form_error('university'); ?></div>
            </div>
            <div class="form-group">
                <label for="citizenship">تابعیت</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="citizenship" id="iranian" value="ایرانی">
                    <label class="form-check-label" for="iranian">ایرانی</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="citizenship" id="foreign" value="اتباع خارجی">
                    <label class="form-check-label" for="foreign">اتباع خارجی</label>
                </div>
                <div class="error"><?php echo form_error('citizenship'); ?></div>
            </div>
            <div class="form-group hidden" id="passport_div">
                <label for="passport_number">شماره پاسپورت</label>
                <input type="text" class="form-control" name="passport_number" id="passport_number">
                <div class="error"><?php echo form_error('passport_number'); ?></div>
            </div>
            <button type="submit" class="btn btn-primary">ثبت</button>
        <?php echo form_close(); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/persian-date@1.0.0/dist/persian-date.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.0.0/dist/js/persian-datepicker.min.js"></script>
    <script>
        $(function() {
            $("#birth_date").persianDatepicker({
                format: 'YYYY-MM-DD',
                viewMode: 'year',
                initialValue: false,
                autoClose: true,
                yearRange: [1350, 1400],
                monthNames: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
                dayNames: ['شنبه', 'یکشنبه', 'دوشنبه', 'سه‌شنبه', 'چهارشنبه', 'پنج‌شنبه', 'جمعه'],
                dayNamesShort: ['ش', 'ی', 'د', 'س', 'چ', 'پ', 'ج'],
                monthNamesShort: ['فر', 'ار', 'خر', 'تی', 'مر', 'شه', 'مه', 'آب', 'آذ', 'دی', 'به', 'اس'],
                persianNumbers: true
            });

            $("input[name='citizenship']").change(function() {
                if ($("#foreign").is(":checked")) {
                    $("#passport_div").removeClass("hidden");
                } else {
                    $("#passport_div").addClass("hidden");
                }
            });
        });


            $(document).ready(function () {
        $("#registrationForm").validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group").find(".error"));
            },
            rules: {
                first_name: {
                    required: true,
                    minlength: 2,
                    maxlength: 35,
                    pattern: /^[\u0600-\u06FF\s]+$/
                },
                last_name: {
                    required: true,
                    minlength: 2,
                    maxlength: 45,
                    pattern: /^[\u0600-\u06FF\s]+$/
                },
                national_id: {
                    required: true,
                    exactlength: 10,
                    digits: true
                },
                phone_number: {
                    required: true,
                    exactlength: 11,
                    pattern: /^09\d{9}$/
                },
                birth_date: {
                    required: true
                },
                education_level: {
                    required: true
                },
                university: {
                    required: true
                },
                citizenship: {
                    required: true
                },
                passport_number: {
                    required: {
                        depends: function(element) {
                            return $("input[name='citizenship']:checked").val() == 'اتباع خارجی';
                        }
                    }
                }
            },
            messages: {
                first_name: {
                    required: "نام را وارد کنید.",
                    minlength: "حداقل باید دو حرف باشد.",
                    maxlength: "حداکثر مجاز 35 حرف است.",
                    pattern: "لطفا نام خود را به فارسی وارد کنید."
                },
                last_name: {
                    required: "نام خانوادگی را وارد کنید.",
                    minlength: "حداقل باید دو حرف باشد.",
                    maxlength: "حداکثر مجاز 45 حرف است.",
                    pattern: "لطفا نام خانوادگی خود را به فارسی وارد کنید."
                },
                national_id: {
                    required: "کد ملی را وارد کنید.",
                    exactlength: "کد ملی باید 10 رقم باشد.",
                    digits: "کد ملی باید عددی باشد."
                },
                phone_number: {
                    required: "شماره همراه را وارد کنید.",
                    exactlength: "شماره همراه باید 11 رقم باشد.",
                    pattern: "فرمت شماره همراه صحیح نیست."
                },
                birth_date: {
                    required: "تاریخ تولد را وارد کنید."
                },
                education_level: {
                    required: "مقطع تحصیلی را انتخاب کنید."
                },
                university: {
                    required: "دانشگاه پذیرفته شده را وارد کنید."
                },
                citizenship: {
                    required: "تابعیت را انتخاب کنید."
                },
                passport_number: {
                    required: "شماره پاسپورت را وارد کنید."
                }
            }
        });
    });
    </script>
</body>