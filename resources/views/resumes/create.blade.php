@extends('layouts.main')
@section('content')
    <style>
        .required {
            color: red;
        }

        .ck-editor__editable {
            height: 7em;
            /* Set the height to show 5 rows of text */
        }
    </style>
    <!-- BEGIN: Content-->
    <div class="app-content content">

        <div class="row match-height">
            <!-- Medal Card -->

            <div class="col-xl-7 col-md-4 col-12 mx-auto">

                <div class="card">

                    <div class="card-body">
                        <h1 class="text-center">Create Resume</h1>

                        <form action="{{ route('resume.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="image">Name<span class="required">*</span></label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    name="image" id="image" value="{{ old('image') }}">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name<span class="required">*</span></label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name Here">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="present_address">Present Address<span class="required">*</span></label>
                                <input class="form-control @error('present_address') is-invalid @enderror" type="text"
                                    name="present_address" id="present_address" value="{{ old('present_address') }}"
                                    placeholder="Enter Present Address Here">
                                @error('present_address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="permanent_address">Permanent Address<span class="required">*</span></label>
                                <input class="form-control @error('permanent_address') is-invalid @enderror" type="text"
                                    name="permanent_address" id="permanent_address" value="{{ old('permanent_address') }}"
                                    placeholder="Enter Permanent Address Here">
                                @error('permanent_address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Primary_phone">Primary Phone<span class="required">*</span></label>
                                <input class="form-control @error('Primary_phone') is-invalid @enderror" type="text"
                                    name="Primary_phone" id="Primary_phone" value="{{ old('Primary_phone') }}"
                                    placeholder="Enter Primary Phone Here">
                                @error('Primary_phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Secondary_phone">Secondary Phone<span class="required">*</span></label>
                                <input class="form-control @error('Secondary_phone') is-invalid @enderror" type="text"
                                    name="Secondary_phone" id="Secondary_phone" value="{{ old('Secondary_phone') }}"
                                    placeholder="Enter Secondary Phone Here">
                                @error('Secondary_phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Primary_email">Primary Email<span class="required">*</span></label>
                                <input class="form-control @error('Primary_email') is-invalid @enderror" type="email"
                                    name="Primary_email" id="Primary_email" value="{{ old('Primary_email') }}"
                                    placeholder="Enter Primary Email Here">
                                @error('Primary_email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Secondary_email">Secondary Email<span class="required">*</span></label>
                                <input class="form-control @error('Secondary_email') is-invalid @enderror" type="email"
                                    name="Secondary_email" id="Secondary_email" value="{{ old('Secondary_email') }}"
                                    placeholder="Enter Secondary Email Here">
                                @error('Secondary_email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="father_name">Father Name<span class="required">*</span></label>
                                <input class="form-control @error('father_name') is-invalid @enderror" type="text"
                                    name="father_name" id="father_name" value="{{ old('father_name') }}"
                                    placeholder="Enter Father Name Here">
                                @error('father_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="mother_name">Mother Name<span class="required">*</span></label>
                                <input class="form-control @error('mother_name') is-invalid @enderror" type="text"
                                    name="mother_name" id="mother_name" value="{{ old('mother_name') }}"
                                    placeholder="Enter Mother Name Here">
                                @error('mother_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="birth_date">Birth Date<span class="required">*</span></label>
                                <input class="form-control @error('birth_date') is-invalid @enderror" type="date"
                                    name="birth_date" id="birth_date" value="{{ old('birth_date') }}"
                                    placeholder="Enter Mother Name Here">
                                @error('birth_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender<span class="required">*</span></label>
                                <input class="form-control @error('gender') is-invalid @enderror" type="text"
                                    name="gender" id="gender" value="{{ old('gender') }}"
                                    placeholder="Enter Gender Here">
                                @error('gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="height">Height<span class="required">*</span></label>
                                <input class="form-control @error('height') is-invalid @enderror" type="text"
                                    name="height" id="height" value="{{ old('height') }}"
                                    placeholder="Enter Height Here">
                                @error('height')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="weight">weight<span class="required">*</span></label>
                                <input class="form-control @error('weight') is-invalid @enderror" type="text"
                                    name="weight" id="weight" value="{{ old('weight') }}"
                                    placeholder="Enter weight Here">
                                @error('weight')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="marital_status">Marital Status<span class="required">*</span></label>
                                <input class="form-control @error('marital_status') is-invalid @enderror" type="text"
                                    name="marital_status" id="marital_status" value="{{ old('marital_status') }}"
                                    placeholder="Enter Marital Status">
                                @error('marital_status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nationality">Nationality<span class="required">*</span></label>
                                <input class="form-control @error('nationality') is-invalid @enderror" type="text"
                                    name="nationality" id="nationality" value="{{ old('nationality') }}"
                                    placeholder="Enter Nationality">
                                @error('nationality')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nid">NID Number<span class="required">*</span></label>
                                <input class="form-control @error('nid') is-invalid @enderror" type="number"
                                    name="nid" id="nid" value="{{ old('nid') }}"
                                    placeholder="Enter NID Number">
                                @error('nid')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="passport">Passport Number<span class="required">*</span></label>
                                <input class="form-control @error('passport') is-invalid @enderror" type="number"
                                    name="passport" id="passport" value="{{ old('passport') }}"
                                    placeholder="Enter Passport Number">
                                @error('passport')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="religion">Religion<span class="required">*</span></label>
                                <input class="form-control @error('religion') is-invalid @enderror" type="number"
                                    name="religion" id="religion" value="{{ old('religion') }}"
                                    placeholder="Enter Religion">
                                @error('religion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="career_objective">Career Objective<span class="required">*</span></label>
                                <textarea class="form-control resizable" name="career_objective" id="career_objective" rows="5"
                                    placeholder="Enter Career Objective Here">{{ old('career_objective') }}</textarea>
                                @error('career_objective')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="career_summary">Career Summary<span class="required">*</span></label>
                                <textarea class="form-control resizable" name="career_summary" id="career_summary" rows="5"
                                    placeholder="Enter Career Summary Here">{{ old('career_summary') }}</textarea>
                                @error('career_summary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="special_qualifications">Special Qualifications<span
                                        class="required">*</span></label>
                                <textarea class="form-control resizable" name="special_qualifications" id="special_qualifications" rows="5"
                                    placeholder="Enter Special Qualifications Here">{{ old('special_qualifications') }}</textarea>
                                @error('special_qualifications')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="employment_history">Employment History<span class="required">*</span></label>
                                <textarea class="form-control resizable" name="employment_history" id="employment_history" rows="5"
                                    placeholder="Enter Employment History Here">{{ old('employment_history') }}</textarea>
                                @error('employment_history')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="academic_qualification">Academic Qualification<span
                                        class="required">*</span></label>
                                <textarea class="form-control resizable" name="academic_qualification" id="academic_qualification" rows="5"
                                    placeholder="Enter Academic Qualification Here">{{ old('academic_qualification') }}</textarea>
                                @error('academic_qualification')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="professional_qualification">Professional Qualification<span
                                        class="required">*</span></label>
                                <textarea class="form-control resizable" name="professional_qualification" id="professional_qualification"
                                    rows="5" placeholder="Enter Professional Qualification Here">{{ old('professional_qualification') }}</textarea>
                                @error('professional_qualification')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="projects">Projects<span class="required">*</span></label>
                                <textarea class="form-control resizable" name="projects" id="projects" rows="5"
                                    placeholder="Enter Projects Here">{{ old('projects') }}</textarea>
                                @error('projects')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="recommendations">Recommendations<span class="required">*</span></label>
                                <textarea class="form-control resizable" name="recommendations" id="recommendations" rows="5"
                                    placeholder="Enter Recommendations Here">{{ old('recommendations') }}</textarea>
                                @error('recommendations')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="training_summary">Training Summary<span class="required">*</span></label>
                                <textarea class="form-control resizable" name="training_summary" id="training_summary" rows="5"
                                    placeholder="Enter Training Summary Here">{{ old('training_summary') }}</textarea>
                                @error('training_summary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="specialization">Specialization<span class="required">*</span></label>
                                <input class="form-control @error('specialization') is-invalid @enderror" type="text"
                                    name="specialization" id="specialization" value="{{ old('specialization') }}"
                                    placeholder="Enter Specialization">
                                @error('specialization')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="extra_curricular">Extra Curricular<span class="required">*</span></label>
                                <input class="form-control @error('extra_curricular') is-invalid @enderror"
                                    type="text" name="extra_curricular" id="extra_curricular"
                                    value="{{ old('extra_curricular') }}" placeholder="Enter Extra Curricular">
                                @error('extra_curricular')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="language_skills">Language Skills<span class="required">*</span></label>
                                <input class="form-control @error('language_skills') is-invalid @enderror" type="text"
                                    name="language_skills" id="language_skills" value="{{ old('language_skills') }}"
                                    placeholder="Enter Language Skills">
                                @error('language_skills')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="looking_for">Looking For<span class="required">*</span></label>
                                <input class="form-control @error('looking_for') is-invalid @enderror" type="text"
                                    name="looking_for" id="looking_for" value="{{ old('looking_for') }}"
                                    placeholder="Enter Looking For">
                                @error('looking_for')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="available_for">Available For<span class="required">*</span></label>
                                <input class="form-control @error('available_for') is-invalid @enderror" type="text"
                                    name="available_for" id="available_for" value="{{ old('available_for') }}"
                                    placeholder="Enter Available For">
                                @error('available_for')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="preferred_job_category">Preferred Job Category<span
                                        class="required">*</span></label>
                                <input class="form-control @error('preferred_job_category') is-invalid @enderror"
                                    type="text" name="preferred_job_category" id="preferred_job_category"
                                    value="{{ old('preferred_job_category') }}"
                                    placeholder="Enter Preferred Job Category">
                                @error('preferred_job_category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="preferred_job_location">Preferred Job Location<span
                                        class="required">*</span></label>
                                <input class="form-control @error('preferred_job_location') is-invalid @enderror"
                                    type="text" name="preferred_job_location" id="preferred_job_location"
                                    value="{{ old('preferred_job_location') }}"
                                    placeholder="Enter Preferred Job Location">
                                @error('preferred_job_location')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="git">GIT<span class="required">*</span></label>
                                <input class="form-control @error('git') is-invalid @enderror" type="text"
                                    name="git" id="git" value="{{ old('git') }}" placeholder="Enter GIT">
                                @error('git')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="linkedin">Linkedin<span class="required">*</span></label>
                                <input class="form-control @error('linkedin') is-invalid @enderror" type="text"
                                    name="linkedin" id="linkedin" value="{{ old('linkedin') }}"
                                    placeholder="Enter Linkedin">
                                @error('linkedin')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook<span class="required">*</span></label>
                                <input class="form-control @error('facebook') is-invalid @enderror" type="text"
                                    name="facebook" id="facebook" value="{{ old('facebook') }}"
                                    placeholder="Enter Facebook">
                                @error('facebook')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="portfolio">Portfolio<span class="required">*</span></label>
                                <input class="form-control @error('portfolio') is-invalid @enderror" type="text"
                                    name="portfolio" id="portfolio" value="{{ old('portfolio') }}"
                                    placeholder="Enter Portfolio">
                                @error('portfolio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>

                                <button type="submit" class="btn btn-success float-right">Create</button>
                                <a href="{{ url('/jobs') }}" class="btn btn-danger">Back</a>

                                <div style="text-align: center;">
                                    <button class="btn btn-primary mb-2" onclick="callvalue()">Preview</button>
                                </div>
                            </div>

                            <h6 class="text-center">
                                Note: <strong class="required">*</strong> Marked Fields Are Required
                            </h6>
                        </form>


                    </div>
                </div>

            </div>
        </div>

        <script>
            ClassicEditor
                .create(document.querySelector('#career_objective'), {
                    toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
                    placeholder: 'Enter Career Objective Here',
                    rows: 5,
                    language: 'en'
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#how_to_apply'), {
                    toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
                    placeholder: 'Enter Description Here',
                    rows: 5,
                    language: 'en'
                })

                .catch(error => {
                    console.error(error);
                });


            function validateDepartment() {
                var departmentSelect = document.getElementById("department_id");
                if (departmentSelect.value === "Select Division...") {
                    alert("Please select a valid department.");
                    departmentSelect.value = "";
                }
            }
        </script>
        <!-- END: Content-->
    </div>
@endsection
