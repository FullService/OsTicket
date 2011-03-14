<?php

#Disable direct access.
if (!strcasecmp(basename($_SERVER['SCRIPT_NAME']), basename( __FILE__ ))) die ('kwaheri rafiki!');

$LANG = array ();

# Language identification
$LANG['LANGUAGE'] = 'ar';
//Word Name (english name)
$LANG['LANGUAGE_NAME'] = 'Arabic';
//Native name of language (in the original language)
$LANG['LANGUAGE_NATIVE_NAME'] = 'العربية';
$LANG['DIRECTION'] = 'rtl';
$LANG['CODEPAGE'] = 'UTF-8';

# Error Mensages
$LANG['ERROR_NAME_REQUIRED'] = 'اسم مطلوب';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'الرسالة المطلوبة';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'غير صالحة من عنوان';
$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'البريد الإلكتروني تحليل فشل';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'خدمات غير متوفرة';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'الوصول مرفوض. ربما التذكرة صالحة معرف';
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'خرق أمني. الانتهاكات المتكررة ستؤدي إلى حسابك حبسهم';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'نوع الملف غير صالح';
$LANG['ERROR_FILE_REJECTED'] = 'الملف {0} رفض';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'غير قادرة على نشر الرسالة. حاول مرة أخرى';
$LANG['ERROR_OCCURED'] = 'حدث خطأ. يرجى المحاولة مرة أخرى';
$LANG['ERROR_UNKNOW_ACTION'] = 'عمل غير معروف';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN'] = 'تذكرة جديدة كنت وصلت الى الحد الأقصى لمحاولات الدخول الفاشلة المسموح بها. حاول مرة أخرى بعد 5 دقائق أو فتح';
$LANG['ERROR_SECURITY_VIOLATION_YOUR_ACCOUNT_WILL_LOCKED'] = 'خرق أمني. الانتهاكات المتكررة ستؤدي إلى حسابك حبسهم';
$LANG['ERROR_ACCESS_DENIED_INVALID_TICKET'] = 'الوصول مرفوض. ربما التذكرة صالحة معرف';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'الرسالة المطلوبة';
$LANG['ERROR_UNABLE_TO_POST_MESSAGE'] = 'غير قادر على نشر الرسالة. حاول مرة أخرى';
$LANG['ERROR_OCCURED_TRY_AGAIN'] = 'حدث خطأ (ق). يرجى المحاولة مرة أخرى';
$LANG['ERROR_UKNOW_ACTION'] = 'غير معروف عمل';
$LANG['ERROR_YOU_MUST_CHANGE_PASSWORD'] = 'يجب تغيير كلمة السر الخاصة بك للمتابعة';

# Titles on pages and web pages
$LANG['TITLE'] = 'تذاكر FullService';
$LANG['TITLE_BOX_NEW_TICKET'] = 'تذكرة جديدة';
$LANG['TITLE_BAR_OFFLINE'] = 'دعم نظام التذاكر';
$LANG['TITLE_OFFLINE'] = 'دعم نظام التذاكر دون اتصال';
$LANG['TITLE_OPEN_PREVIUS_TICKET'] = 'فتح تذكرة عائق';

# Images for Staff and Clients Ends
// relative path of imagens in "translate/".$LANG['LANGUAGE']."/"
$LANG['IMAGE_STAFF_VIEW_OPEN'] = 'staff/view_open.gif';
$LANG['IMAGE_STAFF_VIEW_CLOSED'] = 'staff/view_closed.gif';
$LANG['IMAGE_STAFF_REFRESH'] = 'staff/refresh.gif';

# Labels for Bottons and Headers on Tables, Selections and others
$LANG['LABEL_EMAIL'] = 'البريد الإلكتروني';
$LANG['LABEL_TICKET_NUMBER'] = 'رقم التذكرة';
$LANG['LABEL_FULL_NAME'] = 'بدر تام';
$LANG['LABEL_NAME'] = 'اسم';
$LANG['LABEL_EMAIL_ADDRESS'] = 'عنوان البريد الإلكتروني';
$LANG['LABEL_TELEPHONE'] = 'هاتف';
$LANG['LABEL_PHONE'] = 'هاتف';
$LANG['LABEL_HELP_TOPIC'] = 'موضوع المساعدة';
$LANG['LABEL_SUBJECT'] = 'موضوع';
$LANG['LABEL_MESSAGE'] = 'رسالة';
$LANG['LABEL_PRIORITY'] = 'الأولوية';
$LANG['LABEL_ATTACHMENT'] = 'التعلق';
$LANG['LABEL_TICKET_STATUS'] = 'تذكرة أوضاع';
$LANG['LABEL_VIEW_STATUS'] = 'عرض أوضاع';
$LANG['LABEL_DEPARTMENT'] = 'قسم';
$LANG['LABEL_CREATE_DATE'] = 'تاريخ إنشاء';
$LANG['LABEL_USERNAME'] = 'اسم المستخدم';
$LANG['LABEL_PASSWORD'] = 'كلمة السر';
$LANG['LABEL_PASSWORD_AGAIN'] = '(كلمة المرور (مرة أخرى';
$LANG['LABEL_POST_REPLY']='إضافة رد';
$LANG['LABEL_RESET'] = 'إعادة تعيين';
$LANG['LABEL_CANCEL'] = 'إلغاء';
$LANG['LABEL_SUBMIT'] = 'تقدم';
$LANG['LABEL_TRANSFER'] = 'نقل';
$LANG['LABEL_ASSIGN'] = 'تعيين';
$LANG['LABEL_OPEN_TICKET'] = 'فتح تذكرة';
$LANG['LABEL_OPEN_NEW_TICKET'] = 'فتح تذكرة جديدة';
$LANG['LABEL_SUBMIT_TICKET'] = 'Submit Ticket';
$LANG['LABEL_CHECK_STATUS'] = 'التحقق من أوضاع';
$LANG['LABEL_MY_PROFILE'] = 'ملفاتي';
$LANG['LABEL_PREFERENCES'] = 'تفضيلات';
$LANG['LABEL_CHANGE_PASSWORD'] = 'تغيير كلمة السر';
$LANG['LABEL_MY_PREFERENCES'] = 'بلدي تفضيلات';
$LANG['LABEL_ADMIN_PANEL'] = 'مشرف الفريق';
$LANG['LABEL_STAFF_PANEL'] = 'فريق الموظفين';
$LANG['LABEL_QUERY'] = 'الاستعلام';
$LANG['LABEL_SEARCH'] = 'بحث';
$LANG['LABEL_ADVANCED'] = 'متقدم';
$LANG['LABEL_BASIC'] = 'الأساسية';
$LANG['LABEL_STATUS_IS'] = 'الوضع هو';
$LANG['LABEL_DEPT'] = 'قسم';
$LANG['LABEL_DATE_SPAN'] = 'تاريخ سبان';
$LANG['LABEL_FROM'] = 'من.';
$LANG['LABEL_TO'] = 'ل.';
$LANG['LABEL_SORT_BY'] = 'تصنيف حسب';
$LANG['LABEL_ASCENDING'] = 'تصاعدي';
$LANG['LABEL_DESCENDING'] = 'تنازلي';
$LANG['LABEL_RESULTS_PER_PAGE'] = 'نتائج في الصفحة';

# Generic text for all site, if have to text repeted in
# Client or Staff ends, is prefixed with correct name.
$LANG['TEXT_GENERAL_INQUIRY'] = 'العام التحقيق';
$LANG['TEXT_SELECT_ONE_TOPIC'] = 'حدد واحد';
$LANG['TEXT_ACCESS_DENIED']='وصول مرفوض';
$LANG['TEXT_CREATE_FAILED'] = 'فشل إنشاء';
$LANG['TEXT_WELCOME_BACK'] = 'أهلا بكم من جديد';
$LANG['TEXT_LOG_OUT'] = 'تسجيل الخروج';
$LANG['TEXT_MY_ACCOUNT'] = 'حسابي';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = '<span>دعم نظام التذاكر</span>';
$LANG['TEXT_MY_TICKETS'] = 'بلدي تذاكر';
$LANG['TEXT_TICKETS_STATUS'] = 'تذاكر أوضاع';
$LANG['TEXT_NEW_TICKET'] = 'تذكرة جديدة';
$LANG['TEXT_HOME'] = 'منزل';
$LANG['TEXT_SUPPORT_CENTER'] = 'مركز الدعم';
$LANG['TEXT_WELCOME_TITLE'] = 'مرحبا بكم في مركز الدعم';
$LANG['TEXT_WELCOME_MSG'] = 'من أجل تبسيط طلبات الدعم وتقديم خدمة أفضل لكم ، ونحن على الاستفادة من دعم نظام التذاكر. كل طلب الدعم يتم تعيين فريد عدد التذاكر التي يمكنك استخدامها لتتبع التقدم المحرز والردود على الانترنت. لكي تكون مرجعا لكم نوفر المحفوظات والتاريخ الكامل لجميع طلبات الدعم الخاص بك';
$LANG['TEXT_BOX_NEW_TICKET'] = 'يقدم طلب دعم جديد. كما يرجى تقديم قدر ممكن من التفاصيل حتى نتمكن من مساعدتك أفضل. لتحديث تذكرة التيسبق تقديمها ، الرجاء استخدام النموذج لهذا الحق. وعنوان بريد إلكتروني صالح هو مطلوب.';
$LANG['TEXT_OPEN_NEW_TICKET'] = 'فتح تذكرة جديدة';
$LANG['TEXT_OPEN_PREVIUS_TICKET'] = 'فحص حالة سبق فتح تذكرة. نحن نقدم المحفوظات وتاريخ كل ما تبذلونه من طلبات الدعم الكامل مع الاستجابات';
$LANG['TEXT_TICKET_CREATED'] = 'طلب دعم إنشاء تذكرة';
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'غير قادر على إنشاء تذكرة. الرجاء تصحيح الأخطاء أدناه وحاول مرة أخرى!';
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'يرجى ملء النموذج التالي لفتح تذكرة جديدة.';
$LANG['TEXT_NOT_THIS_USER'] = 'أنا لست هذا المستخدم';
$LANG['TEXT_THANKS_NEW_TICKET'] = 'وقد أنشئت شكرا لك على الاتصال بنا. <br>طلب تذكرة دعم وممثل وسيتم العودة قريبا لك إذا لزم الأمر.';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'تم إرسال بريد إلكتروني مع عدد التذاكر إلى <b>(0) <> ب / ليرة لبنانية أنت في حاجة إلى عدد التذاكر مع البريد الالكتروني الخاص بك لعرض الوضع القائم والتقدم المحرز على الانترنت. مكتوب أعمال إذا كنت ترغب في ارسال تعليقات أو معلومات إضافية بشأن نفس الموضوع ، يرجى اتباع التعليمات التي تظهر على البريد الإلكتروني.';
$LANG['TEXT_SUPPORT_TEAM'] = 'Support Tean';
$LANG['TEXT_MESSAGE_POSTED_SUCCESSFULLY'] = 'أرسلت الرسالة بنجاح';
$LANG['TEXT_TICKET_NUMBER'] = 'تذكرة #';
$LANG['TEXT_TICKET_THREAD'] = 'تذكرة الموضوع';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST']='وسيعاد فتح باب التذاكر على موقع رسالة';
$LANG['TEXT_ENTER_MESSAGE']='أدخل رسالة';
$LANG['TEXT_ATTACH_FILE']='إرفاق ملف';
$LANG['TEXT_POST_REPLY']='إضافة رد';
$LANG['TEXT_VIEW_OPEN']='عرض مفتوح';
$LANG['TEXT_VIEW_CLOSED']='عرض منجزة';
$LANG['TEXT_REFRESH']='تحديث';
$LANG['TEXT_SORT_BY_TICKET_ID']='معرف فرز حسب التذاكر';
$LANG['TEXT_SORT_BY_DATE']='فرز حسب التاريخ';
$LANG['TEXT_SORT_BY_DEPARTMENT']='حسب وزارة';
$LANG['TEXT_NO_TICKETS_FOUND']='لم يتم العثور على تذاكر السفر.';
$LANG['TEXT_AUTHENTICATION_REQUIRED']='مطلوب مصادقة';
$LANG['TEXT_AUTHENTICATION_REQUIRED_QUESTION']='مطلوب مصادقة؟';
$LANG['TEXT_INVALID_LOGIN']='الدخول غير صالح';
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO']='نسيت معلومات تسجيل الدخول الخاصة بك؟ الرجاء <a href="open.php"> فتح <تذكرة جديدة </a>';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS']='Excessive login attempts';
$LANG['TEXT_YOUVE_REACHED_MAXIMUM_FAILED_LOGIN_ATTEMPTS_ALLOWED']='لقد وصلت إلى الحد الأقصى لمحاولات الدخول الفاشلة المسموح بها.';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='محاولات الدخول المفرط (العميل)';
$LANG['TEXT_HEADER_TITLE']='عيون البحرين :: دعم نظام التذاكر';
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='لعرض حالة من التذاكر ، وتقدم لنا تفاصيل تسجيل الدخول الخاصة بك أدناه.<br/>'.
        ' إذا كانت هذه هي المرة الأولى التي الاتصال بنا أو كنت قد فقدت بطاقة الهوية ، من فضلك..</a>.. اضغط هنا..<a href="open.php">.. لفتح تذكرة جديدة.';	
$LANG['TEXT_OFFLINE']='شكرا لاهتمامك في الاتصال بنا.<br>'.
         'مكتب المساعدة لدينا غير متواجد حاليا في هذه اللحظة ، يرجى العودة في وقت لاحق.';
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='لعرض حالة من التذاكر ، وتقدم لنا تفاصيل تسجيل الدخول الخاصة بك أدناه.<br/>'.
        'إذا كانت هذه هي المرة الأولى التي الاتصال بنا أو كنت قد فقدت تذكرة الهوية ، الرجاء<a href="open.php">اضغط هنا</a> لفتح تذكرة جديدة.';	
$LANG['TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY']='توقيت الدورة خارج بسبب عدم النشاط';
$LANG['TEXT_FILE_REJECTED'] = '[ {0} ] رفض الملف';
$LANG['TEXT_INVALID_FILE_TYPE'] = 'Invalid file type [ {0} ]';
$LANG['TEXT_FILE_IS_TOO_BIG'] = 'File is too big. Max {0} bytes allowed'; 
$LANG['TEXT_WELCOME_BACK_VACATION']= 'Welcome back! You are listed as \'on vacation\' Please let admin or your manager know that you are back.';
$LANG['TEXT_WELCOME_BACK_CLIENT'] = 'Welcome back, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK_STAFF'] = 'Welcome back, <strong>{0}</strong>';
$LANG['TEXT_SHOW_FROM_TO_OF_ALL'] = 'Showing {0} - {1} of {2}';
$LANG['TEXT_SHOW_ZERO'] = 'Showing 0 (zero)';
$LANG['TEXT_OVERDUE_TICKETS'] = 'Overdue Tickets';
$LANG['TEXT_ANSWERED_TICKETS'] = 'Answered Tickets';
$LANG['TEXT_ASSIGNED_TICKETS'] = 'Assigned Tickets';
$LANG['TEXT_SEARCH_RESULTS'] = 'Search Results';
$LANG['TEXT_OPEN_TICKETS'] = 'Open Tickets';
$LANG['TEXT_CLOSED_TICKETS'] = 'Closed Tickets';
$LANG['TEXT_OVERDUE_TICKETS'] = 'Overdue Tickets';
$LANG['TEXT_ANY_STATUS'] = 'Any status';
$LANG['TEXT_OPEN'] = 'Open';
$LANG['TEXT_CLOSED'] = 'Closed';
$LANG['TEXT_OVERDUE'] = 'Overdue';

#Alert Messages, normally used with JavaScript dialog box.
$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Excessive login attempts by a client'."\n".
                'Email: {0}'."\n".
				'Ticket#: {1}'."\n".
                'IP: {2}'."\n".
				'Time: {3}'."\n\n".
                'Attempts #{4}';
?>
