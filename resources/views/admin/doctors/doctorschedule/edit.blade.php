@extends('admin.layouts.dashboard')

@section('title', 'Doctor | Edit Schedule Doctor')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Jadwal Dokter</h1>
    <form action="{{ route('jadwal-dokter.update', $doctorSchedule->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="mb-3" style="margin-top: 2%;">
            <label class="form-label">Dokter</label><br>
            <select class="form-control input-length select2" id="doctor_id" name="doctor_id" disabled="true" style="width: auto;">
                <option value="{{ $doctorSchedule->doctor->id }}">{{ $doctorSchedule->doctor->name }}</option>
            </select>
        </div>

        <div class="mb-3" style="margin-top: 2%;">
            <label class="form-label">Senin</label><br>
            <div class="row input-clock-length">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="time" class="form-control" id="senin_1" name="senin_1" value="{{ old('senin', $senin1 ?? '') }}" autocomplete="off">
                    </div>
                </div>
                <div style="margin-top: 0.5%;">
                    -
                </div>
                <div class="col-md-5">
                    <div class="input-group clockpicker" id="senin2">
                        <input type="time" class="form-control" id="senin_2" value="{{ old('senin', $senin2 ?? '') }}" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden field for Senin -->
        <input type="hidden" id="senin_merged" name="senin_merged">

        <div class="mb-3" style="margin-top: 2%;">
            <label class="form-label">Selasa</label><br>
            <div class="row input-clock-length">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="time" class="form-control" id="selasa_1" name="selasa_1" value="{{ old('selasa', $selasa1 ?? '') }}" autocomplete="off">
                    </div>
                </div>
                <div style="margin-top: 0.5%;">
                    -
                </div>
                <div class="col-md-5">
                    <div class="input-group clockpicker" id="selasa2">
                        <input type="time" class="form-control" id="selasa_2" value="{{ old('selasa', $selasa2 ?? '') }}" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden field for Selasa -->
        <input type="hidden" id="selasa_merged" name="selasa_merged">

        <div class="mb-3" style="margin-top: 2%;">
            <label class="form-label">Rabu</label><br>
            <div class="row input-clock-length">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="time" class="form-control" id="rabu_1" name="rabu_1" value="{{ old('rabu', $rabu1 ?? '') }}" autocomplete="off">
                    </div>
                </div>
                <div style="margin-top: 0.5%;">
                    -
                </div>
                <div class="col-md-5">
                    <div class="input-group clockpicker" id="rabu2">
                        <input type="time" class="form-control" id="rabu_2" value="{{ old('rabu', $rabu2 ?? '') }}" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden field for rabu -->
        <input type="hidden" id="rabu_merged" name="rabu_merged">

        <div class="mb-3" style="margin-top: 2%;">
            <label class="form-label">Kamis</label><br>
            <div class="row input-clock-length">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="time" class="form-control" id="kamis_1" name="kamis_1" value="{{ old('kamis', $kamis1 ?? '') }}" autocomplete="off">
                    </div>
                </div>
                <div style="margin-top: 0.5%;">
                    -
                </div>
                <div class="col-md-5">
                    <div class="input-group clockpicker" id="kamis2">
                        <input type="time" class="form-control" id="kamis_2" value="{{ old('kamis', $kamis2 ?? '') }}" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden field for kamis -->
        <input type="hidden" id="kamis_merged" name="kamis_merged">

        <div class="mb-3" style="margin-top: 2%;">
            <label class="form-label">Jumat</label><br>
            <div class="row input-clock-length">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="time" class="form-control" id="jumat_1" name="jumat_1" value="{{ old('jumat', $jumat1 ?? '') }}" autocomplete="off">
                    </div>
                </div>
                <div style="margin-top: 0.5%;">
                    -
                </div>
                <div class="col-md-5">
                    <div class="input-group clockpicker" id="jumat2">
                        <input type="time" class="form-control" id="jumat_2" value="{{ old('jumat', $jumat2 ?? '') }}" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden field for jumat -->
        <input type="hidden" id="jumat_merged" name="jumat_merged">

        <div class="mb-3" style="margin-top: 2%;">
            <label class="form-label">Sabtu</label><br>
            <div class="row input-clock-length">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="time" class="form-control" id="sabtu_1" name="sabtu_1" value="{{ old('sabtu', $sabtu1 ?? '') }}" autocomplete="off">
                    </div>
                </div>
                <div style="margin-top: 0.5%;">
                    -
                </div>
                <div class="col-md-5">
                    <div class="input-group clockpicker" id="sabtu2">
                        <input type="time" class="form-control" id="sabtu_2" value="{{ old('sabtu', $sabtu2 ?? '') }}" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden field for sabtu -->
        <input type="hidden" id="sabtu_merged" name="sabtu_merged">

        <div class="mb-3" style="margin-top: 2%;">
            <label class="form-label">Minggu</label><br>
            <div class="row input-clock-length">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="time" class="form-control" id="minggu_1" name="minggu_1" value="{{ old('minggu', $minggu1 ?? '') }}" autocomplete="off">
                    </div>
                </div>
                <div style="margin-top: 0.5%;">
                    -
                </div>
                <div class="col-md-5">
                    <div class="input-group clockpicker" id="minggu2">
                        <input type="time" class="form-control" id="minggu_2" value="{{ old('minggu', $minggu2 ?? '') }}" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden field for minggu -->
        <input type="hidden" id="minggu_merged" name="minggu_merged">

        <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
        <button type="reset" class="btn btn-md btn-warning">RESET</button>
    </form>

</div>
<!-- /.container-fluid -->
@endsection

@section('script')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Define the days and the corresponding input IDs
        const days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];

        // Loop through each day to bind the logic
        days.forEach(day => {
            const time1 = document.getElementById(`${day}_1`);
            const time2 = document.getElementById(`${day}_2`);
            const mergedInput = document.getElementById(`${day}_merged`);

            // Function to combine the two times for a specific day
            function updateMergedData() {
                const time1Value = time1.value;
                const time2Value = time2.value;

                // Combine the times (you can use a comma, space, or other separator)
                mergedInput.value = `${time1Value} - ${time2Value}`;
            }

            // Update the merged data when either of the time inputs changes
            time1.addEventListener('change', updateMergedData);
            time2.addEventListener('change', updateMergedData);

            // Optionally, set the merged data when the form is submitted
            const form = document.querySelector('form'); // Adjust if necessary
            form.addEventListener('submit', function() {
                updateMergedData();
            });
        });
    });
</script>


@endsection