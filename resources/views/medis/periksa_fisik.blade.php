@extends('layouts.dashboard')

@section('content')

<form id="regForm" action="{{route('fisik.store',$berobat->id)}}" method="POST">
    @csrf
    <div class="tab">
        <h3>Pemeriksa</h3>
        <div>
            <input type="hidden" id="berobat_id" name="berobat_id" value="{{$berobat->id}}">
            <input type="hidden" id="pasien_id" name="pasien_id" value="{{$berobat->pasien_id}}">
            <input class="form-control" type="hidden" id="status" name="status" value="1">
            <label for="">No berobat</label>
            <input class="form-control" type="text" value="{{$berobat->no}}" aria-label="default input example"
                readonly>
        </div>
        <div>
            <label for="">Tanggal berobat</label>
            <input class="form-control" type="text" id="tgl" name="tgl" value="@php echo date('d-m-Y') @endphp"
                aria-label="default input example" readonly>
        </div>
        <div>
            <label for="">Dokter</label>
            <select class="form-select" name="dokter" aria-label="Default select example">
                <option selected>--pilih--</option>
                @foreach($dokter as $dok)
                <option value="{{$dok->nama}}({{$dok->spesialis}})">{{$dok->nama}}({{$dok->spesialis}})</option>
                @endforeach
              </select>
        </div>
        <div>  
            <label for="">Nama perawat</label>
            <select class="form-select" name="perawat" aria-label="Default select example">
                <option selected>--pilih--</option>
                @foreach($perawat as $per)
                <option value="{{$per->nama}}({{$per->spesialis}})">{{$per->nama}}({{$per->spesialis}})</option>
                @endforeach
              </select>
        </div>
        <div>
            <label>Poli</label>
            <select name="poli" class="form-control">
                <option value="">--Pilih--</option>
                <option value="Umum">Umum</option>
                <option value="Anak">Anak</option>
                <option value="Gigi">Gigi</option>
                <option value="KB">KB</option>
                <option value="kandungan">kandungan</option>
            </select>
        </div>
    </div>
<br>
    <div class="tab">
        <h3>Pemeriksaan badan</h3>
        <div>
            <label for="">Sistolik</label>
            <input class="form-control" type="number" id="sistolik" name="sistolik" oninput="this.className = ''"
                aria-label="default input example" autofocus>
        </div>
        <div>
            <label for="">Diastolik</label>
            <input class="form-control" type="number" id="diastolik" name="diastolik" oninput="this.className = ''"
                aria-label="default input example">
        </div>
        <div>
            <label for="">Saturasi</label>
            <input class="form-control" type="text" id="saturasi" name="saturasi" oninput="this.className = ''"
                aria-label="default input example">
        </div>
        <div>
            <label for="">Suhu</label>
            <input class="form-control" type="text" id="suhu" name="suhu" oninput="this.className = ''"
                aria-label="default input example">
        </div>
        <div>
            <label for="">Napas</label>
            <input class="form-control" type="number" id="napas" name="napas" oninput="this.className = ''"
                aria-label="default input example">
            <br>
        </div>
        <div>
            <label for="">Tinggi</label>
            <input class="form-control" type="text" id="tinggi" name="tinggi" oninput="this.className = ''"
                aria-label="default input example">
        </div>
        <div>
            <label for="">Berat</label>
            <input class="form-control" type="text" id="berat" name="berat" oninput="this.className = ''"
                aria-label="default input example">
            <br>
        </div>
    </div>
    <br>
    <div class="tab">
        <h3>Pemeriksaan badan</h3>
        <div>
            <label for="">Keluhan</label>
            <textarea id="keluhan" name="keluhan" class="form-control"  style="height: 100px" autofocus></textarea>
        </div>
        <div>
            <label for="">Daignosa</label>
            <input class="form-control" type="text" id="diagnosa" name="diagnosa" oninput="this.className = ''"
                aria-label="default input example">
        </div>
        <div>
          <label for="">Tindakan berobat</label>
          <input class="form-control" type="text" id="tindakan" name="tindakan" oninput="this.className = ''"
              aria-label="default input example">
      </div>
        <div>
          <label>Biaya</label>
          @php 
              if($berobat->jenis == 'Umum'){
                  echo '<input class="form-control" type="number" id="biaya" name="biaya" value="'.$berobat->umum.'" aria-label="default input example">';
              }if ($berobat->jenis == 'BPJS') {
                  echo '<input class="form-control" type="number" id="biaya" name="biaya" value="'.$berobat->umum.'" aria-label="default input example">';
              }
          @endphp
      </div>
    </div>
    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:10px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

@endsection