@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-package-variant-closed"></i>
                </span>{{__('all_strings.newpost')}}
            </h3>
        </div>

        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{url('/Admin/NewPostDone')}}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>

                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.title')}}</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.title')}}" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.categorory')}}</label>
                                <select class="form-control" name="category" required>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.status')}}</label>
                                <select class="form-control" name="visible" required>
                                    <option value="1">{{__('all_strings.vis')}}</option>
                                    <option value="0">{{__('all_strings.hide')}}</option>
                                </select>
                            </div>

                            <div class="form-group" style="display: none;">
                                <label for="exampleInputUsername1">{{__('all_strings.image_addrs')}}</label>
                                <input value="-" type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.image_addrs')}}" name="img_adrs" required>
                            </div>



                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.content')}}</label>

                                <!--Content Managment Start-->
                                <section>

                                    <style>
                                        #container {
                                            width: 100%;
                                            margin: 20px auto;
                                        }
                                        .ck-editor__editable[role="textbox"] {
                                            /* editing area */
                                            min-height: 200px;
                                        }
                                        .ck-content .image {
                                            /* block images */
                                            max-width: 80%;
                                            margin: 20px auto;
                                        }
                                    </style>

                                    <div id="container">
                                        <textarea name="cntent" id="cntent">
                                        </textarea>
                                    </div>

                                    <script src="{{asset('admin-assets/js/ckeditor.js')}}"></script>

                                    <script>
                                        // This sample still does not showcase all CKEditor 5 features (!)
                                        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
                                        var editor=CKEDITOR.ClassicEditor.create(document.getElementById("cntent"), {
                                            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                                            toolbar: {
                                                items: [
                                                    'exportPDF','exportWord', '|',
                                                    'findAndReplace', 'selectAll', '|',
                                                    'heading', '|',
                                                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                                                    'bulletedList', 'numberedList', 'todoList', '|',
                                                    'outdent', 'indent', '|',
                                                    'undo', 'redo',
                                                    '-',
                                                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                                                    'alignment', '|',
                                                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                                                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                                                    'textPartLanguage', '|',
                                                    'sourceEditing'
                                                ],
                                                shouldNotGroupWhenFull: true
                                            },
                                            // Changing the language of the interface requires loading the language file using the <script> tag.
                                            // language: 'es',
                                            list: {
                                                properties: {
                                                    styles: true,
                                                    startIndex: true,
                                                    reversed: true
                                                }
                                            },
                                            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                                            heading: {
                                                options: [
                                                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                                                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                                                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                                                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                                                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                                                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                                                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                                                ]
                                            },
                                            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                                            placeholder: 'مطلب خود را اینجا بنویسید',
                                            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                                            fontFamily: {
                                                options: [
                                                    'default',
                                                    'Arial, Helvetica, sans-serif',
                                                    'Courier New, Courier, monospace',
                                                    'Georgia, serif',
                                                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                                                    'Tahoma, Geneva, sans-serif',
                                                    'Times New Roman, Times, serif',
                                                    'Trebuchet MS, Helvetica, sans-serif',
                                                    'Verdana, Geneva, sans-serif'
                                                ],
                                                supportAllValues: true
                                            },
                                            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                                            fontSize: {
                                                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                                                supportAllValues: true
                                            },
                                            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                                            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                                            htmlSupport: {
                                                allow: [
                                                    {
                                                        name: /.*/,
                                                        attributes: true,
                                                        classes: true,
                                                        styles: true
                                                    }
                                                ]
                                            },
                                            // Be careful with enabling previews
                                            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                                            htmlEmbed: {
                                                showPreviews: true
                                            },
                                            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                                            link: {
                                                decorators: {
                                                    addTargetToExternalLinks: true,
                                                    defaultProtocol: 'https://',
                                                    toggleDownloadable: {
                                                        mode: 'manual',
                                                        label: 'Downloadable',
                                                        attributes: {
                                                            download: 'file'
                                                        }
                                                    }
                                                }
                                            },
                                            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                                            mention: {
                                                feeds: [
                                                    {
                                                        marker: '@',
                                                        feed: [
                                                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                                            '@sugar', '@sweet', '@topping', '@wafer'
                                                        ],
                                                        minimumCharacters: 1
                                                    }
                                                ]
                                            },
                                            // The "super-build" contains more premium features that require additional configuration, disable them below.
                                            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                                            removePlugins: [
                                                // These two are commercial, but you can try them out without registering to a trial.
                                                // 'ExportPdf',
                                                // 'ExportWord',
                                                'CKBox',
                                                'CKFinder',
                                                'EasyImage',
                                                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                                                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                                                // Storing images as Base64 is usually a very bad idea.
                                                // Replace it on production website with other solutions:
                                                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                                                // 'Base64UploadAdapter',
                                                'RealTimeCollaborativeComments',
                                                'RealTimeCollaborativeTrackChanges',
                                                'RealTimeCollaborativeRevisionHistory',
                                                'PresenceList',
                                                'Comments',
                                                'TrackChanges',
                                                'TrackChangesData',
                                                'RevisionHistory',
                                                'Pagination',
                                                'WProofreader',
                                                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                                                // from a local file system (file://) - load this site via HTTP server if you enable MathType
                                                'MathType'
                                            ]
                                        });
                                    </script>

                                </section>
                                <!--Content Managment End-->

                            </div>



                            <button type="submit" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</btn>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- content-wrapper ends -->




@include('Admin.Panel.Layouts.Footer_Panel')
