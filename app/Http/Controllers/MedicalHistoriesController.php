<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MedicalHistories;

use App\Patient;

use Illuminate\Support\Facades\Input;

use Response;

use Session;

use PDF;

class MedicalHistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $clinicLogID)
    {
        $medicalHistory = MedicalHistories::where('patientID', '=', $id)->first();
        $patient = Patient::find($id);
       // dd($medicalHistory);
      return view('physician.C_physician_patient_consult')->with(['medicalHistory' => $medicalHistory, 'patient' => $patient, 'clinicLogID' => $clinicLogID]);
    }

    public function mChiefCreate($id, $clinicLogID)
    {
        $medicalHistory = MedicalHistories::where('patientID', '=', $id)->first();
        $patient = Patient::find($id);
       // dd($medicalHistory);
      return view('chief.C_mchief_patient_consult')->with(['medicalHistory' => $medicalHistory, 'patient' => $patient, 'clinicLogID' => $clinicLogID]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {

            $medicalHistory = new MedicalHistories;

            $medicalHistory->patientID = $id;
            $medicalHistory->pastMedAsthma = Input::get('pastMedicalHistoryAsthma');
            $medicalHistory->pastMedHeartDis = Input::get('pastMedicalHistoryHeartDisease');
            $medicalHistory->pastMedSeizure = Input::get('pastMedicalHistorySeizure');
            $medicalHistory->pastMedPrimComplex = Input::get('pastMedicalHistoryPrimaryComplex');
            $medicalHistory->pastMedHypervent = Input::get('pastMedicalHistoryHyperventilation');
            $medicalHistory->pastMedMeasles = Input::get('pastMedicalHistoryMeasles');
            $medicalHistory->pastMedChickenPox = Input::get('pastMedicalHistoryChickenPox');
            $medicalHistory->pastMedOther = Input::get('pastMedicalHistoryOther');
            $medicalHistory->pastMedOtherDetails = Input::get('pastMedicalHistoryOtherTextArea');
            $medicalHistory->pastMedPrevHosp = Input::get('previousHospitalization');
            $medicalHistory->pastMedPrevHospDetails = Input::get('previousHospitalizationTextArea');
            $medicalHistory->pastMedOprSrg = Input::get('operationSurgery');
            $medicalHistory->pastMedOprSrgDetails = Input::get('operationSurgeryTextArea');
            $medicalHistory->currentMeds = Input::get('currentMedications');
            $medicalHistory->currentMedsDetails = Input::get('currentMedicationsTextArea');
            $medicalHistory->famHistDiabetes = Input::get('famHistoryDiabetes');
            $medicalHistory->famHistHypervent = Input::get('famHistoryHyperTension');
            $medicalHistory->famHistHeartDis = Input::get('famHistoryHeartDisease');
            $medicalHistory->famHistPTB = Input::get('famHistoryPTB');
            $medicalHistory->famHistCancer = Input::get('famHistoryCancer');
            $medicalHistory->otherFamHist = Input::get('famHistoryOther');
            $medicalHistory->otherFamHistDetails = Input::get('famHistoryOtherTextArea');
            $medicalHistory->headWound = Input::get('headWound');
            $medicalHistory->headMass = Input::get('headMass');
            $medicalHistory->headAlopecia = Input::get('headAlopecia');
            $medicalHistory->earsNoGrossDetor = Input::get('earsNoGrossDetormity');
            $medicalHistory->earsNoDischarge = Input::get('earsNoDischarge');
            $medicalHistory->throatNoTCP = Input::get('throatNoTcp');
            $medicalHistory->throatNoMass = Input::get('throatNoMass');
            $medicalHistory->throatNoLymph = Input::get('throatNoLymphadenopthy');
            $medicalHistory->extremeNoDeform = Input::get('extremitiesNoDeformities');
            $medicalHistory->eyesPale = Input::get('eyesPale');
            $medicalHistory->eyesPPC = Input::get('eyesPinkPalberalConjunctiva');
            $medicalHistory->eyesIcteric = Input::get('eyesIcteric');
            $medicalHistory->eyesAnicScleric = Input::get('eyesAnictericSclera');
            $medicalHistory->eyesWithGlasses = Input::get('eyesWithGlasses');
            $medicalHistory->eyeGlassesGrade = Input::get('eyesWithGlassesTextArea');
            $medicalHistory->chestLungsClrBreathSnd = Input::get('chestClearBreathSounds');
            $medicalHistory->chestLungsOther = Input::get('chestOther');
            $medicalHistory->chestLungsOtherDetails = Input::get('chestOtherTextArea');
            $medicalHistory->heartRegularRate = Input::get('heartRegular');
            $medicalHistory->heartOther = Input::get('heartOther');
            $medicalHistory->heartOtherDetails = Input::get('heartOtherTextArea');
            $medicalHistory->vertColState = Input::get('vcolumnState');
            $medicalHistory->vertColDeformDetails = Input::get('vcolumnWithDeformitiesTextArea');
            $medicalHistory->chestXRayState = Input::get('xrayState');
            $medicalHistory->chestXrayDeformDetails = Input::get('xrayWithDeformitiesTextArea');
            $medicalHistory->normalAbdomen = Input::get('abdomenNormal');
            $medicalHistory->normalBreast = Input::get('breastNormal');
            $medicalHistory->skinNoLesions = Input::get('skinNoLesions');
            $medicalHistory->skinOther = Input::get('skinOther');
            $medicalHistory->skinOtherDetails = Input::get('skinOtherTextArea');
            $medicalHistory->firstDayOfLastMens = Input::get('mensFirstDay');
            $medicalHistory->menarche = Input::get('mensMenarche');
            $medicalHistory->mensDuration = Input::get('mensDuration');
            $medicalHistory->mensInterval = Input::get('mensInterval');
            $medicalHistory->mensAmount = Input::get('mensAmounts');
            $medicalHistory->mensSymptoms = Input::get('mensSymptoms');
            $medicalHistory->circumcisionDate = Input::get('circumcisionDate');
            $medicalHistory->immuBCG = Input::get('immuBCG');
            $medicalHistory->immuMeasles = Input::get('immuMeasles');
            $medicalHistory->immuMMR = Input::get('immuMMR');
            $medicalHistory->immuVaricella = Input::get('immuVaricella');
            $medicalHistory->immuPneumo = Input::get('immuPneumonococcal');
            $medicalHistory->immuHaemoInfluB = Input::get('immuHInfluenza');
            $medicalHistory->immuHepaB = Input::get('immuhepatitis');
            $medicalHistory->immuDPT = Input::get('immudpt');

            $medicalHistory->save();

            return Response::json(array('message' => 'Successfully Saved!'));
            
        } catch (Exception $e) {
            
        }
       


    }

    public function mChiefStore(Request $request, $id)
    {
        try {

            $medicalHistory = new MedicalHistories;

            $medicalHistory->patientID = $id;
            $medicalHistory->pastMedAsthma = Input::get('pastMedicalHistoryAsthma');
            $medicalHistory->pastMedHeartDis = Input::get('pastMedicalHistoryHeartDisease');
            $medicalHistory->pastMedSeizure = Input::get('pastMedicalHistorySeizure');
            $medicalHistory->pastMedPrimComplex = Input::get('pastMedicalHistoryPrimaryComplex');
            $medicalHistory->pastMedHypervent = Input::get('pastMedicalHistoryHyperventilation');
            $medicalHistory->pastMedMeasles = Input::get('pastMedicalHistoryMeasles');
            $medicalHistory->pastMedChickenPox = Input::get('pastMedicalHistoryChickenPox');
            $medicalHistory->pastMedOther = Input::get('pastMedicalHistoryOther');
            $medicalHistory->pastMedOtherDetails = Input::get('pastMedicalHistoryOtherTextArea');
            $medicalHistory->pastMedPrevHosp = Input::get('previousHospitalization');
            $medicalHistory->pastMedPrevHospDetails = Input::get('previousHospitalizationTextArea');
            $medicalHistory->pastMedOprSrg = Input::get('operationSurgery');
            $medicalHistory->pastMedOprSrgDetails = Input::get('operationSurgeryTextArea');
            $medicalHistory->currentMeds = Input::get('currentMedications');
            $medicalHistory->currentMedsDetails = Input::get('currentMedicationsTextArea');
            $medicalHistory->famHistDiabetes = Input::get('famHistoryDiabetes');
            $medicalHistory->famHistHypervent = Input::get('famHistoryHyperTension');
            $medicalHistory->famHistHeartDis = Input::get('famHistoryHeartDisease');
            $medicalHistory->famHistPTB = Input::get('famHistoryPTB');
            $medicalHistory->famHistCancer = Input::get('famHistoryCancer');
            $medicalHistory->otherFamHist = Input::get('famHistoryOther');
            $medicalHistory->otherFamHistDetails = Input::get('famHistoryOtherTextArea');
            $medicalHistory->headWound = Input::get('headWound');
            $medicalHistory->headMass = Input::get('headMass');
            $medicalHistory->headAlopecia = Input::get('headAlopecia');
            $medicalHistory->earsNoGrossDetor = Input::get('earsNoGrossDetormity');
            $medicalHistory->earsNoDischarge = Input::get('earsNoDischarge');
            $medicalHistory->throatNoTCP = Input::get('throatNoTcp');
            $medicalHistory->throatNoMass = Input::get('throatNoMass');
            $medicalHistory->throatNoLymph = Input::get('throatNoLymphadenopthy');
            $medicalHistory->extremeNoDeform = Input::get('extremitiesNoDeformities');
            $medicalHistory->eyesPale = Input::get('eyesPale');
            $medicalHistory->eyesPPC = Input::get('eyesPinkPalberalConjunctiva');
            $medicalHistory->eyesIcteric = Input::get('eyesIcteric');
            $medicalHistory->eyesAnicScleric = Input::get('eyesAnictericSclera');
            $medicalHistory->eyesWithGlasses = Input::get('eyesWithGlasses');
            $medicalHistory->eyeGlassesGrade = Input::get('eyesWithGlassesTextArea');
            $medicalHistory->chestLungsClrBreathSnd = Input::get('chestClearBreathSounds');
            $medicalHistory->chestLungsOther = Input::get('chestOther');
            $medicalHistory->chestLungsOtherDetails = Input::get('chestOtherTextArea');
            $medicalHistory->heartRegularRate = Input::get('heartRegular');
            $medicalHistory->heartOther = Input::get('heartOther');
            $medicalHistory->heartOtherDetails = Input::get('heartOtherTextArea');
            $medicalHistory->vertColState = Input::get('vcolumnState');
            $medicalHistory->vertColDeformDetails = Input::get('vcolumnWithDeformitiesTextArea');
            $medicalHistory->chestXRayState = Input::get('xrayState');
            $medicalHistory->chestXrayDeformDetails = Input::get('xrayWithDeformitiesTextArea');
            $medicalHistory->normalAbdomen = Input::get('abdomenNormal');
            $medicalHistory->normalBreast = Input::get('breastNormal');
            $medicalHistory->skinNoLesions = Input::get('skinNoLesions');
            $medicalHistory->skinOther = Input::get('skinOther');
            $medicalHistory->skinOtherDetails = Input::get('skinOtherTextArea');
            $medicalHistory->firstDayOfLastMens = Input::get('mensFirstDay');
            $medicalHistory->menarche = Input::get('mensMenarche');
            $medicalHistory->mensDuration = Input::get('mensDuration');
            $medicalHistory->mensInterval = Input::get('mensInterval');
            $medicalHistory->mensAmount = Input::get('mensAmounts');
            $medicalHistory->mensSymptoms = Input::get('mensSymptoms');
            $medicalHistory->circumcisionDate = Input::get('circumcisionDate');
            $medicalHistory->immuBCG = Input::get('immuBCG');
            $medicalHistory->immuMeasles = Input::get('immuMeasles');
            $medicalHistory->immuMMR = Input::get('immuMMR');
            $medicalHistory->immuVaricella = Input::get('immuVaricella');
            $medicalHistory->immuPneumo = Input::get('immuPneumonococcal');
            $medicalHistory->immuHaemoInfluB = Input::get('immuHInfluenza');
            $medicalHistory->immuHepaB = Input::get('immuhepatitis');
            $medicalHistory->immuDPT = Input::get('immudpt');

            $medicalHistory->save();

            return Response::json(array('message' => 'Successfully Saved!'));
            
        } catch (Exception $e) {
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $clinicLogID)
    {
        $medicalHistory = MedicalHistories::where('patientID', '=', $id)->first();
        $patient = Patient::find($id);
        return view('physician.C_physician_patient_view_history')->with(['medicalHistory' => $medicalHistory, 'patient' => $patient, 'clinicLogID' => $clinicLogID]);
    }

    public function mChiefShow($id, $clinicLogID)
    {
        $medicalHistory = MedicalHistories::where('patientID', '=', $id)->first();
        $patient = Patient::find($id);
        return view('chief.C_mchief_patient_view_history')->with(['medicalHistory' => $medicalHistory, 'patient' => $patient, 'clinicLogID' => $clinicLogID]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $medicalHistory = MedicalHistories::where('patientID', '=', $id)->first();

            $medicalHistory->pastMedAsthma = Input::get('pastMedicalHistoryAsthma');
            $medicalHistory->pastMedHeartDis = Input::get('pastMedicalHistoryHeartDisease');
            $medicalHistory->pastMedSeizure = Input::get('pastMedicalHistorySeizure');
            $medicalHistory->pastMedPrimComplex = Input::get('pastMedicalHistoryPrimaryComplex');
            $medicalHistory->pastMedHypervent = Input::get('pastMedicalHistoryHyperventilation');
            $medicalHistory->pastMedMeasles = Input::get('pastMedicalHistoryMeasles');
            $medicalHistory->pastMedChickenPox = Input::get('pastMedicalHistoryChickenPox');
            $medicalHistory->pastMedOther = Input::get('pastMedicalHistoryOther');
            $medicalHistory->pastMedOtherDetails = Input::get('pastMedicalHistoryOtherTextArea');
            $medicalHistory->pastMedPrevHosp = Input::get('previousHospitalization');
            $medicalHistory->pastMedPrevHospDetails = Input::get('previousHospitalizationTextArea');
            $medicalHistory->pastMedOprSrg = Input::get('operationSurgery');
            $medicalHistory->pastMedOprSrgDetails = Input::get('operationSurgeryTextArea');
            $medicalHistory->currentMeds = Input::get('currentMedications');
            $medicalHistory->currentMedsDetails = Input::get('currentMedicationsTextArea');
            $medicalHistory->famHistDiabetes = Input::get('famHistoryDiabetes');
            $medicalHistory->famHistHypervent = Input::get('famHistoryHyperTension');
            $medicalHistory->famHistHeartDis = Input::get('famHistoryHeartDisease');
            $medicalHistory->famHistPTB = Input::get('famHistoryPTB');
            $medicalHistory->famHistCancer = Input::get('famHistoryCancer');
            $medicalHistory->otherFamHist = Input::get('famHistoryOther');
            $medicalHistory->otherFamHistDetails = Input::get('famHistoryOtherTextArea');
            $medicalHistory->headWound = Input::get('headWound');
            $medicalHistory->headMass = Input::get('headMass');
            $medicalHistory->headAlopecia = Input::get('headAlopecia');
            $medicalHistory->earsNoGrossDetor = Input::get('earsNoGrossDetormity');
            $medicalHistory->earsNoDischarge = Input::get('earsNoDischarge');
            $medicalHistory->throatNoTCP = Input::get('throatNoTcp');
            $medicalHistory->throatNoMass = Input::get('throatNoMass');
            $medicalHistory->throatNoLymph = Input::get('throatNoLymphadenopthy');
            $medicalHistory->extremeNoDeform = Input::get('extremitiesNoDeformities');
            $medicalHistory->eyesPale = Input::get('eyesPale');
            $medicalHistory->eyesPPC = Input::get('eyesPinkPalberalConjunctiva');
            $medicalHistory->eyesIcteric = Input::get('eyesIcteric');
            $medicalHistory->eyesAnicScleric = Input::get('eyesAnictericSclera');
            $medicalHistory->eyesWithGlasses = Input::get('eyesWithGlasses');
            $medicalHistory->eyeGlassesGrade = Input::get('eyesWithGlassesTextArea');
            $medicalHistory->chestLungsClrBreathSnd = Input::get('chestClearBreathSounds');
            $medicalHistory->chestLungsOther = Input::get('chestOther');
            $medicalHistory->chestLungsOtherDetails = Input::get('chestOtherTextArea');
            $medicalHistory->heartRegularRate = Input::get('heartRegular');
            $medicalHistory->heartOther = Input::get('heartOther');
            $medicalHistory->heartOtherDetails = Input::get('heartOtherTextArea');
            $medicalHistory->vertColState = Input::get('vcolumnState');
            $medicalHistory->vertColDeformDetails = Input::get('vcolumnWithDeformitiesTextArea');
            $medicalHistory->chestXRayState = Input::get('xrayState');
            $medicalHistory->chestXrayDeformDetails = Input::get('xrayWithDeformitiesTextArea');
            $medicalHistory->normalAbdomen = Input::get('abdomenNormal');
            $medicalHistory->normalBreast = Input::get('breastNormal');
            $medicalHistory->skinNoLesions = Input::get('skinNoLesions');
            $medicalHistory->skinOther = Input::get('skinOther');
            $medicalHistory->skinOtherDetails = Input::get('skinOtherTextArea');
            $medicalHistory->firstDayOfLastMens = Input::get('mensFirstDay');
            $medicalHistory->menarche = Input::get('mensMenarche');
            $medicalHistory->mensDuration = Input::get('mensDuration');
            $medicalHistory->mensInterval = Input::get('mensInterval');
            $medicalHistory->mensAmount = Input::get('mensAmounts');
            $medicalHistory->mensSymptoms = Input::get('mensSymptoms');
            $medicalHistory->circumcisionDate = Input::get('circumcisionDate');
            $medicalHistory->immuBCG = Input::get('immuBCG');
            $medicalHistory->immuMeasles = Input::get('immuMeasles');
            $medicalHistory->immuMMR = Input::get('immuMMR');
            $medicalHistory->immuVaricella = Input::get('immuVaricella');
            $medicalHistory->immuPneumo = Input::get('immuPneumonococcal');
            $medicalHistory->immuHaemoInfluB = Input::get('immuHInfluenza');
            $medicalHistory->immuHepaB = Input::get('immuhepatitis');
            $medicalHistory->immuDPT = Input::get('immudpt');

            $medicalHistory->save();

            return Response::json(array('message' => 'Successfully Saved!'));
            
        } catch (Exception $e) {
            
        }
    }

    public function mChiefUpdate(Request $request, $id)
    {
        try {

            $medicalHistory = MedicalHistories::where('patientID', '=', $id)->first();

            $medicalHistory->pastMedAsthma = Input::get('pastMedicalHistoryAsthma');
            $medicalHistory->pastMedHeartDis = Input::get('pastMedicalHistoryHeartDisease');
            $medicalHistory->pastMedSeizure = Input::get('pastMedicalHistorySeizure');
            $medicalHistory->pastMedPrimComplex = Input::get('pastMedicalHistoryPrimaryComplex');
            $medicalHistory->pastMedHypervent = Input::get('pastMedicalHistoryHyperventilation');
            $medicalHistory->pastMedMeasles = Input::get('pastMedicalHistoryMeasles');
            $medicalHistory->pastMedChickenPox = Input::get('pastMedicalHistoryChickenPox');
            $medicalHistory->pastMedOther = Input::get('pastMedicalHistoryOther');
            $medicalHistory->pastMedOtherDetails = Input::get('pastMedicalHistoryOtherTextArea');
            $medicalHistory->pastMedPrevHosp = Input::get('previousHospitalization');
            $medicalHistory->pastMedPrevHospDetails = Input::get('previousHospitalizationTextArea');
            $medicalHistory->pastMedOprSrg = Input::get('operationSurgery');
            $medicalHistory->pastMedOprSrgDetails = Input::get('operationSurgeryTextArea');
            $medicalHistory->currentMeds = Input::get('currentMedications');
            $medicalHistory->currentMedsDetails = Input::get('currentMedicationsTextArea');
            $medicalHistory->famHistDiabetes = Input::get('famHistoryDiabetes');
            $medicalHistory->famHistHypervent = Input::get('famHistoryHyperTension');
            $medicalHistory->famHistHeartDis = Input::get('famHistoryHeartDisease');
            $medicalHistory->famHistPTB = Input::get('famHistoryPTB');
            $medicalHistory->famHistCancer = Input::get('famHistoryCancer');
            $medicalHistory->otherFamHist = Input::get('famHistoryOther');
            $medicalHistory->otherFamHistDetails = Input::get('famHistoryOtherTextArea');
            $medicalHistory->headWound = Input::get('headWound');
            $medicalHistory->headMass = Input::get('headMass');
            $medicalHistory->headAlopecia = Input::get('headAlopecia');
            $medicalHistory->earsNoGrossDetor = Input::get('earsNoGrossDetormity');
            $medicalHistory->earsNoDischarge = Input::get('earsNoDischarge');
            $medicalHistory->throatNoTCP = Input::get('throatNoTcp');
            $medicalHistory->throatNoMass = Input::get('throatNoMass');
            $medicalHistory->throatNoLymph = Input::get('throatNoLymphadenopthy');
            $medicalHistory->extremeNoDeform = Input::get('extremitiesNoDeformities');
            $medicalHistory->eyesPale = Input::get('eyesPale');
            $medicalHistory->eyesPPC = Input::get('eyesPinkPalberalConjunctiva');
            $medicalHistory->eyesIcteric = Input::get('eyesIcteric');
            $medicalHistory->eyesAnicScleric = Input::get('eyesAnictericSclera');
            $medicalHistory->eyesWithGlasses = Input::get('eyesWithGlasses');
            $medicalHistory->eyeGlassesGrade = Input::get('eyesWithGlassesTextArea');
            $medicalHistory->chestLungsClrBreathSnd = Input::get('chestClearBreathSounds');
            $medicalHistory->chestLungsOther = Input::get('chestOther');
            $medicalHistory->chestLungsOtherDetails = Input::get('chestOtherTextArea');
            $medicalHistory->heartRegularRate = Input::get('heartRegular');
            $medicalHistory->heartOther = Input::get('heartOther');
            $medicalHistory->heartOtherDetails = Input::get('heartOtherTextArea');
            $medicalHistory->vertColState = Input::get('vcolumnState');
            $medicalHistory->vertColDeformDetails = Input::get('vcolumnWithDeformitiesTextArea');
            $medicalHistory->chestXRayState = Input::get('xrayState');
            $medicalHistory->chestXrayDeformDetails = Input::get('xrayWithDeformitiesTextArea');
            $medicalHistory->normalAbdomen = Input::get('abdomenNormal');
            $medicalHistory->normalBreast = Input::get('breastNormal');
            $medicalHistory->skinNoLesions = Input::get('skinNoLesions');
            $medicalHistory->skinOther = Input::get('skinOther');
            $medicalHistory->skinOtherDetails = Input::get('skinOtherTextArea');
            $medicalHistory->firstDayOfLastMens = Input::get('mensFirstDay');
            $medicalHistory->menarche = Input::get('mensMenarche');
            $medicalHistory->mensDuration = Input::get('mensDuration');
            $medicalHistory->mensInterval = Input::get('mensInterval');
            $medicalHistory->mensAmount = Input::get('mensAmounts');
            $medicalHistory->mensSymptoms = Input::get('mensSymptoms');
            $medicalHistory->circumcisionDate = Input::get('circumcisionDate');
            $medicalHistory->immuBCG = Input::get('immuBCG');
            $medicalHistory->immuMeasles = Input::get('immuMeasles');
            $medicalHistory->immuMMR = Input::get('immuMMR');
            $medicalHistory->immuVaricella = Input::get('immuVaricella');
            $medicalHistory->immuPneumo = Input::get('immuPneumonococcal');
            $medicalHistory->immuHaemoInfluB = Input::get('immuHInfluenza');
            $medicalHistory->immuHepaB = Input::get('immuhepatitis');
            $medicalHistory->immuDPT = Input::get('immudpt');

            $medicalHistory->save();

            return Response::json(array('message' => 'Successfully Saved!'));
            
        } catch (Exception $e) {
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function printMedicalHistory($id)
    {
        $medicalHistory = MedicalHistories::join('patients', 'patients.patientID', '=', 'medicalhistories.patientID')
                          ->where('medicalhistories.patientID', '=', $id)->first();
       // dd($medicalHistory);
        $pdf = PDF::loadView('reports.medical_history', compact('medicalHistory'))->setPaper('legal');
        return $pdf->stream('reports.medical_history');
    }
}
