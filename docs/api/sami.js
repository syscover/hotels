
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">Syscover</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Syscover_Hotels" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Hotels.html">Hotels</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Syscover_Hotels_Controllers" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Hotels/Controllers.html">Controllers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Syscover_Hotels_Controllers_DecorationController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Controllers/DecorationController.html">DecorationController</a>                    </div>                </li>                            <li data-name="class:Syscover_Hotels_Controllers_EnvironmentController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Controllers/EnvironmentController.html">EnvironmentController</a>                    </div>                </li>                            <li data-name="class:Syscover_Hotels_Controllers_HotelController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Controllers/HotelController.html">HotelController</a>                    </div>                </li>                            <li data-name="class:Syscover_Hotels_Controllers_PublicationController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Controllers/PublicationController.html">PublicationController</a>                    </div>                </li>                            <li data-name="class:Syscover_Hotels_Controllers_RelationshipController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Controllers/RelationshipController.html">RelationshipController</a>                    </div>                </li>                            <li data-name="class:Syscover_Hotels_Controllers_ServiceController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Controllers/ServiceController.html">ServiceController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Syscover_Hotels_Models" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Hotels/Models.html">Models</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Syscover_Hotels_Models_Decoration" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Models/Decoration.html">Decoration</a>                    </div>                </li>                            <li data-name="class:Syscover_Hotels_Models_Environment" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Models/Environment.html">Environment</a>                    </div>                </li>                            <li data-name="class:Syscover_Hotels_Models_Hotel" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Models/Hotel.html">Hotel</a>                    </div>                </li>                            <li data-name="class:Syscover_Hotels_Models_HotelLang" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Models/HotelLang.html">HotelLang</a>                    </div>                </li>                            <li data-name="class:Syscover_Hotels_Models_HotelProduct" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Models/HotelProduct.html">HotelProduct</a>                    </div>                </li>                            <li data-name="class:Syscover_Hotels_Models_Publication" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Models/Publication.html">Publication</a>                    </div>                </li>                            <li data-name="class:Syscover_Hotels_Models_Relationship" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Models/Relationship.html">Relationship</a>                    </div>                </li>                            <li data-name="class:Syscover_Hotels_Models_Service" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Hotels/Models/Service.html">Service</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Syscover_Hotels_HotelsServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Syscover/Hotels/HotelsServiceProvider.html">HotelsServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Syscover.html", "name": "Syscover", "doc": "Namespace Syscover"},{"type": "Namespace", "link": "Syscover/Hotels.html", "name": "Syscover\\Hotels", "doc": "Namespace Syscover\\Hotels"},{"type": "Namespace", "link": "Syscover/Hotels/Controllers.html", "name": "Syscover\\Hotels\\Controllers", "doc": "Namespace Syscover\\Hotels\\Controllers"},{"type": "Namespace", "link": "Syscover/Hotels/Models.html", "name": "Syscover\\Hotels\\Models", "doc": "Namespace Syscover\\Hotels\\Models"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Controllers", "fromLink": "Syscover/Hotels/Controllers.html", "link": "Syscover/Hotels/Controllers/DecorationController.html", "name": "Syscover\\Hotels\\Controllers\\DecorationController", "doc": "&quot;Class DecorationController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\DecorationController", "fromLink": "Syscover/Hotels/Controllers/DecorationController.html", "link": "Syscover/Hotels/Controllers/DecorationController.html#method_indexCustom", "name": "Syscover\\Hotels\\Controllers\\DecorationController::indexCustom", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\DecorationController", "fromLink": "Syscover/Hotels/Controllers/DecorationController.html", "link": "Syscover/Hotels/Controllers/DecorationController.html#method_storeCustomRecord", "name": "Syscover\\Hotels\\Controllers\\DecorationController::storeCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\DecorationController", "fromLink": "Syscover/Hotels/Controllers/DecorationController.html", "link": "Syscover/Hotels/Controllers/DecorationController.html#method_updateCustomRecord", "name": "Syscover\\Hotels\\Controllers\\DecorationController::updateCustomRecord", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Controllers", "fromLink": "Syscover/Hotels/Controllers.html", "link": "Syscover/Hotels/Controllers/EnvironmentController.html", "name": "Syscover\\Hotels\\Controllers\\EnvironmentController", "doc": "&quot;Class EnvironmentController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\EnvironmentController", "fromLink": "Syscover/Hotels/Controllers/EnvironmentController.html", "link": "Syscover/Hotels/Controllers/EnvironmentController.html#method_indexCustom", "name": "Syscover\\Hotels\\Controllers\\EnvironmentController::indexCustom", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\EnvironmentController", "fromLink": "Syscover/Hotels/Controllers/EnvironmentController.html", "link": "Syscover/Hotels/Controllers/EnvironmentController.html#method_storeCustomRecord", "name": "Syscover\\Hotels\\Controllers\\EnvironmentController::storeCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\EnvironmentController", "fromLink": "Syscover/Hotels/Controllers/EnvironmentController.html", "link": "Syscover/Hotels/Controllers/EnvironmentController.html#method_updateCustomRecord", "name": "Syscover\\Hotels\\Controllers\\EnvironmentController::updateCustomRecord", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Controllers", "fromLink": "Syscover/Hotels/Controllers.html", "link": "Syscover/Hotels/Controllers/HotelController.html", "name": "Syscover\\Hotels\\Controllers\\HotelController", "doc": "&quot;Class HotelController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\HotelController", "fromLink": "Syscover/Hotels/Controllers/HotelController.html", "link": "Syscover/Hotels/Controllers/HotelController.html#method_indexCustom", "name": "Syscover\\Hotels\\Controllers\\HotelController::indexCustom", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\HotelController", "fromLink": "Syscover/Hotels/Controllers/HotelController.html", "link": "Syscover/Hotels/Controllers/HotelController.html#method_customActionUrlParameters", "name": "Syscover\\Hotels\\Controllers\\HotelController::customActionUrlParameters", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\HotelController", "fromLink": "Syscover/Hotels/Controllers/HotelController.html", "link": "Syscover/Hotels/Controllers/HotelController.html#method_createCustomRecord", "name": "Syscover\\Hotels\\Controllers\\HotelController::createCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\HotelController", "fromLink": "Syscover/Hotels/Controllers/HotelController.html", "link": "Syscover/Hotels/Controllers/HotelController.html#method_checkSpecialRulesToStore", "name": "Syscover\\Hotels\\Controllers\\HotelController::checkSpecialRulesToStore", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\HotelController", "fromLink": "Syscover/Hotels/Controllers/HotelController.html", "link": "Syscover/Hotels/Controllers/HotelController.html#method_storeCustomRecord", "name": "Syscover\\Hotels\\Controllers\\HotelController::storeCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\HotelController", "fromLink": "Syscover/Hotels/Controllers/HotelController.html", "link": "Syscover/Hotels/Controllers/HotelController.html#method_editCustomRecord", "name": "Syscover\\Hotels\\Controllers\\HotelController::editCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\HotelController", "fromLink": "Syscover/Hotels/Controllers/HotelController.html", "link": "Syscover/Hotels/Controllers/HotelController.html#method_checkSpecialRulesToUpdate", "name": "Syscover\\Hotels\\Controllers\\HotelController::checkSpecialRulesToUpdate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\HotelController", "fromLink": "Syscover/Hotels/Controllers/HotelController.html", "link": "Syscover/Hotels/Controllers/HotelController.html#method_updateCustomRecord", "name": "Syscover\\Hotels\\Controllers\\HotelController::updateCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\HotelController", "fromLink": "Syscover/Hotels/Controllers/HotelController.html", "link": "Syscover/Hotels/Controllers/HotelController.html#method_addToDeleteRecord", "name": "Syscover\\Hotels\\Controllers\\HotelController::addToDeleteRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\HotelController", "fromLink": "Syscover/Hotels/Controllers/HotelController.html", "link": "Syscover/Hotels/Controllers/HotelController.html#method_addToDeleteTranslationRecord", "name": "Syscover\\Hotels\\Controllers\\HotelController::addToDeleteTranslationRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\HotelController", "fromLink": "Syscover/Hotels/Controllers/HotelController.html", "link": "Syscover/Hotels/Controllers/HotelController.html#method_addToDeleteRecordsSelect", "name": "Syscover\\Hotels\\Controllers\\HotelController::addToDeleteRecordsSelect", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\HotelController", "fromLink": "Syscover/Hotels/Controllers/HotelController.html", "link": "Syscover/Hotels/Controllers/HotelController.html#method_apiCheckSlug", "name": "Syscover\\Hotels\\Controllers\\HotelController::apiCheckSlug", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Controllers", "fromLink": "Syscover/Hotels/Controllers.html", "link": "Syscover/Hotels/Controllers/PublicationController.html", "name": "Syscover\\Hotels\\Controllers\\PublicationController", "doc": "&quot;Class PublicationController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\PublicationController", "fromLink": "Syscover/Hotels/Controllers/PublicationController.html", "link": "Syscover/Hotels/Controllers/PublicationController.html#method_storeCustomRecord", "name": "Syscover\\Hotels\\Controllers\\PublicationController::storeCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\PublicationController", "fromLink": "Syscover/Hotels/Controllers/PublicationController.html", "link": "Syscover/Hotels/Controllers/PublicationController.html#method_updateCustomRecord", "name": "Syscover\\Hotels\\Controllers\\PublicationController::updateCustomRecord", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Controllers", "fromLink": "Syscover/Hotels/Controllers.html", "link": "Syscover/Hotels/Controllers/RelationshipController.html", "name": "Syscover\\Hotels\\Controllers\\RelationshipController", "doc": "&quot;Class RelationshipController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\RelationshipController", "fromLink": "Syscover/Hotels/Controllers/RelationshipController.html", "link": "Syscover/Hotels/Controllers/RelationshipController.html#method_indexCustom", "name": "Syscover\\Hotels\\Controllers\\RelationshipController::indexCustom", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\RelationshipController", "fromLink": "Syscover/Hotels/Controllers/RelationshipController.html", "link": "Syscover/Hotels/Controllers/RelationshipController.html#method_storeCustomRecord", "name": "Syscover\\Hotels\\Controllers\\RelationshipController::storeCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\RelationshipController", "fromLink": "Syscover/Hotels/Controllers/RelationshipController.html", "link": "Syscover/Hotels/Controllers/RelationshipController.html#method_updateCustomRecord", "name": "Syscover\\Hotels\\Controllers\\RelationshipController::updateCustomRecord", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Controllers", "fromLink": "Syscover/Hotels/Controllers.html", "link": "Syscover/Hotels/Controllers/ServiceController.html", "name": "Syscover\\Hotels\\Controllers\\ServiceController", "doc": "&quot;Class ServiceController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\ServiceController", "fromLink": "Syscover/Hotels/Controllers/ServiceController.html", "link": "Syscover/Hotels/Controllers/ServiceController.html#method_indexCustom", "name": "Syscover\\Hotels\\Controllers\\ServiceController::indexCustom", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\ServiceController", "fromLink": "Syscover/Hotels/Controllers/ServiceController.html", "link": "Syscover/Hotels/Controllers/ServiceController.html#method_storeCustomRecord", "name": "Syscover\\Hotels\\Controllers\\ServiceController::storeCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Controllers\\ServiceController", "fromLink": "Syscover/Hotels/Controllers/ServiceController.html", "link": "Syscover/Hotels/Controllers/ServiceController.html#method_updateCustomRecord", "name": "Syscover\\Hotels\\Controllers\\ServiceController::updateCustomRecord", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels", "fromLink": "Syscover/Hotels.html", "link": "Syscover/Hotels/HotelsServiceProvider.html", "name": "Syscover\\Hotels\\HotelsServiceProvider", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\HotelsServiceProvider", "fromLink": "Syscover/Hotels/HotelsServiceProvider.html", "link": "Syscover/Hotels/HotelsServiceProvider.html#method_boot", "name": "Syscover\\Hotels\\HotelsServiceProvider::boot", "doc": "&quot;Bootstrap the application services.&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\HotelsServiceProvider", "fromLink": "Syscover/Hotels/HotelsServiceProvider.html", "link": "Syscover/Hotels/HotelsServiceProvider.html#method_register", "name": "Syscover\\Hotels\\HotelsServiceProvider::register", "doc": "&quot;Register the application services.&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Models", "fromLink": "Syscover/Hotels/Models.html", "link": "Syscover/Hotels/Models/Decoration.html", "name": "Syscover\\Hotels\\Models\\Decoration", "doc": "&quot;Class Decoration&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Decoration", "fromLink": "Syscover/Hotels/Models/Decoration.html", "link": "Syscover/Hotels/Models/Decoration.html#method_validate", "name": "Syscover\\Hotels\\Models\\Decoration::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Decoration", "fromLink": "Syscover/Hotels/Models/Decoration.html", "link": "Syscover/Hotels/Models/Decoration.html#method_scopeBuilder", "name": "Syscover\\Hotels\\Models\\Decoration::scopeBuilder", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Decoration", "fromLink": "Syscover/Hotels/Models/Decoration.html", "link": "Syscover/Hotels/Models/Decoration.html#method_getLang", "name": "Syscover\\Hotels\\Models\\Decoration::getLang", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Decoration", "fromLink": "Syscover/Hotels/Models/Decoration.html", "link": "Syscover/Hotels/Models/Decoration.html#method_addToGetRecordsLimit", "name": "Syscover\\Hotels\\Models\\Decoration::addToGetRecordsLimit", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Models", "fromLink": "Syscover/Hotels/Models.html", "link": "Syscover/Hotels/Models/Environment.html", "name": "Syscover\\Hotels\\Models\\Environment", "doc": "&quot;Class Environment&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Environment", "fromLink": "Syscover/Hotels/Models/Environment.html", "link": "Syscover/Hotels/Models/Environment.html#method_validate", "name": "Syscover\\Hotels\\Models\\Environment::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Environment", "fromLink": "Syscover/Hotels/Models/Environment.html", "link": "Syscover/Hotels/Models/Environment.html#method_scopeBuilder", "name": "Syscover\\Hotels\\Models\\Environment::scopeBuilder", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Environment", "fromLink": "Syscover/Hotels/Models/Environment.html", "link": "Syscover/Hotels/Models/Environment.html#method_getLang", "name": "Syscover\\Hotels\\Models\\Environment::getLang", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Environment", "fromLink": "Syscover/Hotels/Models/Environment.html", "link": "Syscover/Hotels/Models/Environment.html#method_addToGetRecordsLimit", "name": "Syscover\\Hotels\\Models\\Environment::addToGetRecordsLimit", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Models", "fromLink": "Syscover/Hotels/Models.html", "link": "Syscover/Hotels/Models/Hotel.html", "name": "Syscover\\Hotels\\Models\\Hotel", "doc": "&quot;Class Hotel&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Hotel", "fromLink": "Syscover/Hotels/Models/Hotel.html", "link": "Syscover/Hotels/Models/Hotel.html#method_validate", "name": "Syscover\\Hotels\\Models\\Hotel::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Hotel", "fromLink": "Syscover/Hotels/Models/Hotel.html", "link": "Syscover/Hotels/Models/Hotel.html#method_scopeBuilder", "name": "Syscover\\Hotels\\Models\\Hotel::scopeBuilder", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Hotel", "fromLink": "Syscover/Hotels/Models/Hotel.html", "link": "Syscover/Hotels/Models/Hotel.html#method_getLang", "name": "Syscover\\Hotels\\Models\\Hotel::getLang", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Hotel", "fromLink": "Syscover/Hotels/Models/Hotel.html", "link": "Syscover/Hotels/Models/Hotel.html#method_getPublications", "name": "Syscover\\Hotels\\Models\\Hotel::getPublications", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Hotel", "fromLink": "Syscover/Hotels/Models/Hotel.html", "link": "Syscover/Hotels/Models/Hotel.html#method_getServices", "name": "Syscover\\Hotels\\Models\\Hotel::getServices", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Hotel", "fromLink": "Syscover/Hotels/Models/Hotel.html", "link": "Syscover/Hotels/Models/Hotel.html#method_getHotelProducts", "name": "Syscover\\Hotels\\Models\\Hotel::getHotelProducts", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Hotel", "fromLink": "Syscover/Hotels/Models/Hotel.html", "link": "Syscover/Hotels/Models/Hotel.html#method_getProducts", "name": "Syscover\\Hotels\\Models\\Hotel::getProducts", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Hotel", "fromLink": "Syscover/Hotels/Models/Hotel.html", "link": "Syscover/Hotels/Models/Hotel.html#method_addToGetRecordsLimit", "name": "Syscover\\Hotels\\Models\\Hotel::addToGetRecordsLimit", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Hotel", "fromLink": "Syscover/Hotels/Models/Hotel.html", "link": "Syscover/Hotels/Models/Hotel.html#method_getTranslationRecord", "name": "Syscover\\Hotels\\Models\\Hotel::getTranslationRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Hotel", "fromLink": "Syscover/Hotels/Models/Hotel.html", "link": "Syscover/Hotels/Models/Hotel.html#method_getRecords", "name": "Syscover\\Hotels\\Models\\Hotel::getRecords", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Models", "fromLink": "Syscover/Hotels/Models.html", "link": "Syscover/Hotels/Models/HotelLang.html", "name": "Syscover\\Hotels\\Models\\HotelLang", "doc": "&quot;Class HotelLang&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\HotelLang", "fromLink": "Syscover/Hotels/Models/HotelLang.html", "link": "Syscover/Hotels/Models/HotelLang.html#method_validate", "name": "Syscover\\Hotels\\Models\\HotelLang::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\HotelLang", "fromLink": "Syscover/Hotels/Models/HotelLang.html", "link": "Syscover/Hotels/Models/HotelLang.html#method_getLang", "name": "Syscover\\Hotels\\Models\\HotelLang::getLang", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Models", "fromLink": "Syscover/Hotels/Models.html", "link": "Syscover/Hotels/Models/HotelProduct.html", "name": "Syscover\\Hotels\\Models\\HotelProduct", "doc": "&quot;Class HotelProduct&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\HotelProduct", "fromLink": "Syscover/Hotels/Models/HotelProduct.html", "link": "Syscover/Hotels/Models/HotelProduct.html#method_validate", "name": "Syscover\\Hotels\\Models\\HotelProduct::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\HotelProduct", "fromLink": "Syscover/Hotels/Models/HotelProduct.html", "link": "Syscover/Hotels/Models/HotelProduct.html#method_scopeBuilder", "name": "Syscover\\Hotels\\Models\\HotelProduct::scopeBuilder", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\HotelProduct", "fromLink": "Syscover/Hotels/Models/HotelProduct.html", "link": "Syscover/Hotels/Models/HotelProduct.html#method_getRecords", "name": "Syscover\\Hotels\\Models\\HotelProduct::getRecords", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Models", "fromLink": "Syscover/Hotels/Models.html", "link": "Syscover/Hotels/Models/Publication.html", "name": "Syscover\\Hotels\\Models\\Publication", "doc": "&quot;Class Publication&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Publication", "fromLink": "Syscover/Hotels/Models/Publication.html", "link": "Syscover/Hotels/Models/Publication.html#method_validate", "name": "Syscover\\Hotels\\Models\\Publication::validate", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Models", "fromLink": "Syscover/Hotels/Models.html", "link": "Syscover/Hotels/Models/Relationship.html", "name": "Syscover\\Hotels\\Models\\Relationship", "doc": "&quot;Class Relationship&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Relationship", "fromLink": "Syscover/Hotels/Models/Relationship.html", "link": "Syscover/Hotels/Models/Relationship.html#method_validate", "name": "Syscover\\Hotels\\Models\\Relationship::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Relationship", "fromLink": "Syscover/Hotels/Models/Relationship.html", "link": "Syscover/Hotels/Models/Relationship.html#method_scopeBuilder", "name": "Syscover\\Hotels\\Models\\Relationship::scopeBuilder", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Relationship", "fromLink": "Syscover/Hotels/Models/Relationship.html", "link": "Syscover/Hotels/Models/Relationship.html#method_getLang", "name": "Syscover\\Hotels\\Models\\Relationship::getLang", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Relationship", "fromLink": "Syscover/Hotels/Models/Relationship.html", "link": "Syscover/Hotels/Models/Relationship.html#method_addToGetRecordsLimit", "name": "Syscover\\Hotels\\Models\\Relationship::addToGetRecordsLimit", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Hotels\\Models", "fromLink": "Syscover/Hotels/Models.html", "link": "Syscover/Hotels/Models/Service.html", "name": "Syscover\\Hotels\\Models\\Service", "doc": "&quot;Class Service&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Service", "fromLink": "Syscover/Hotels/Models/Service.html", "link": "Syscover/Hotels/Models/Service.html#method_validate", "name": "Syscover\\Hotels\\Models\\Service::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Service", "fromLink": "Syscover/Hotels/Models/Service.html", "link": "Syscover/Hotels/Models/Service.html#method_scopeBuilder", "name": "Syscover\\Hotels\\Models\\Service::scopeBuilder", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Service", "fromLink": "Syscover/Hotels/Models/Service.html", "link": "Syscover/Hotels/Models/Service.html#method_getLang", "name": "Syscover\\Hotels\\Models\\Service::getLang", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Hotels\\Models\\Service", "fromLink": "Syscover/Hotels/Models/Service.html", "link": "Syscover/Hotels/Models/Service.html#method_addToGetRecordsLimit", "name": "Syscover\\Hotels\\Models\\Service::addToGetRecordsLimit", "doc": "&quot;\n&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


