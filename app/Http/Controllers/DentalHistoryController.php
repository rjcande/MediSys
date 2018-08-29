<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\DentalLog;
use App\Patient;
use App\Account;
use App\Medicine;
use App\MedicalSupply;
use App\Treatment;
use App\Prescription;
use App\DentalHistory;
use App\UsedMedSupply;
use App\Diagnosis;
// use Carbon\Carbon;
use Response;
use Redirect;
use Session;
use DB;

class DentalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patientInfo = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                ->orderBy('cliniclogs.created_at', 'desc')
                                ->select('patients.*','cliniclogs.*')
                                ->where([['cliniclogs.isDeleted', '<>', '1'], ['cliniclogs.clinicType', '=', 'D']])
                                ->first();


        // dd($patientInfo);

        return view ('dentist.C_dentist_dental_form')->with('patientInfo',$patientInfo);
    }
    public function indexOfDentalChief()
    {
        $patientInfo = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
                                ->orderBy('cliniclogs.created_at', 'desc')
                                ->select('patients.*','cliniclogs.*')
                                ->where([['cliniclogs.isDeleted', '<>', '1'], ['cliniclogs.clinicType', '=', 'D']])
                                ->first();


        // dd($patientInfo);

        return view ('dchief.C_dchief_dental_form')->with('patientInfo',$patientInfo);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       try{

        // $patientID = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
        //                         ->orderBy('cliniclogs.clinicLogID', 'desc')
        //                         ->select('patients.*','cliniclogs.*')
        //                         ->where([['cliniclogs.isDeleted', '<>', '1'], ['cliniclogs.clinicType', '=', 'D']])
        //                         ->first();

        $dentalHistory = new DentalHistory;

        $dentalHistory->patientID = Session::get('patientInfo.patientID');
        $dentalHistory->physicianName = $request->physicianName;
        $dentalHistory->physicianSpecialty = $request->physicianSpecialty;
        $dentalHistory->phyOfficeAdd = $request->officeAddress;
        $dentalHistory->phyOfficeNum = $request->officeNumber;
        $dentalHistory->inGoodHealth = $request->goodHealth;
        $dentalHistory->underMedTreatment = $request->medicalTreatmentRdBtn;
        $dentalHistory->conditionTreated = $request->medicalTreatmentTextarea;
        $dentalHistory->hadIllnessSurgOpr = $request->seriousIllnessRdBtn;
        $dentalHistory->illnessSurgOprDetails = $request->seriousIllnessTextarea;
        $dentalHistory->isHospitalized = $request->hospitalizedRdBtn;
        $dentalHistory->reasonForHosp = $request->hospitalizedTextarea;
        $dentalHistory->takesMedication = $request->medicationRdBtn;
        $dentalHistory->medSpecification = $request->medicationTextarea;
        $dentalHistory->useTobacco = $request->tobacco;
        $dentalHistory->useAlcOrDrugs = $request->alcoholUse;
        $dentalHistory->allergicToLclAnesthetic = $request->allergyLocalAnesthetic;
        $dentalHistory->allergicToSultaDrugs = $request->allergySultaDrugs;
        $dentalHistory->allergicToAspirin = $request->allergyAspirin;
        $dentalHistory->allergicToPenAntibiotics = $request->allergyPenicillinAntibiotics;
        $dentalHistory->allergicToLatex = $request->allergyLatex;
        $dentalHistory->allergicToOther = $request->allergyOthers;
        $dentalHistory->OtherAllergyDetails = $request->allergyOthersTextarea;
        $dentalHistory->isBleeding = $request->bleedingGumsRdBtn;
        $dentalHistory->bleedingTime = $request->bleedingTimeTextbox;
        $dentalHistory->isPregnant =  $request->pregnant;
        $dentalHistory->isNursing = $request->nursing;
        $dentalHistory->isTakingBirthControls = $request->birthControlPills;
        $dentalHistory->bloodType = $request->bloodTypeTextbox;
        // $dentalHistory->bloodPressure = $request->bloodPressureTextbox;
        $dentalHistory->hasHighBloodPress = $request->highBloodCheckbox;
        $dentalHistory->hasLowBloodPress = $request->lowBloodCheckbox;
        $dentalHistory->hasEpiConvulsions = $request->epilepsyCheckbox;
        $dentalHistory->hasAidsHIV = $request->aidsCheckbox;
        $dentalHistory->hasSTD = $request->stdCheckbox;
        $dentalHistory->hasStomachTrbls = $request->ulcersCheckbox;
        $dentalHistory->hasFaintingSeizure = $request->faintingSeizuresCheckbox;
        $dentalHistory->hasRapidWeightLoss = $request->weightLossCheckbox;
        $dentalHistory->hasRadiotheraphy = $request->radiationTherapyCheckbox;
        $dentalHistory->hasJointRepImplacement = $request->jointReplacementCheckbox;
        $dentalHistory->hasHeartSurgery = $request->heartSurgeryCheckbox;
        $dentalHistory->hasHeartAttack = $request->heartAttackCheckbox;
        $dentalHistory->hasThyroidProbs = $request->thyroidProblemCheckbox;
        $dentalHistory->hasHeartDisease = $request->heartDiseaseCheckbox;
        $dentalHistory->hasHeartMurmur = $request->heartMurmurCheckbox;
        $dentalHistory->hasHepaLiverDisease = $request->liverDiseaseCheckbox;
        $dentalHistory->hasRheumaticFever = $request->rheumaticCheckbox;
        $dentalHistory->hasHayfeverAllergies = $request->hayFeverCheckbox;
        $dentalHistory->hasRespiratoryProbs = $request->respiratoryCheckbox;
        $dentalHistory->hasHepatitisJaundice = $request->hepatitisCheckbox;
        $dentalHistory->hasTB = $request->tuberculosisCheckbox;
        $dentalHistory->hasSwollenAnkles = $request->swollenAnklesCheckbox;
        $dentalHistory->hasKidneyDisease = $request->kidneyDiseaseCheckbox;
        $dentalHistory->hasDiabetes = $request->diabetesCheckbox;
        $dentalHistory->hasChestPain = $request->chestPainCheckbox;
        $dentalHistory->hasStroke = $request->strokeCheckbox;
        $dentalHistory->hasCancerTumor = $request->cancerTumorsCheckbox;
        $dentalHistory->hasAnemia = $request->anemiaCheckbox;
        $dentalHistory->hasAngina = $request->anginaCheckbox;
        $dentalHistory->hasAsthma = $request->asthmaCheckbox;
        $dentalHistory->hasEmphysema = $request->emphysemaCheckbox;
        $dentalHistory->hasBleedingProbs = $request->bleedingProblemsCheckbox;
        $dentalHistory->hasBloodDisease = $request->bloodDiseaseCheckbox;
        $dentalHistory->hasHeadInjuries = $request->headInjuriesCheckbox;
        $dentalHistory->hasArthritisRheuma = $request->arthritisCheckbox;
        $dentalHistory->hasOthers = $request->othersCheckbox;
        $dentalHistory->OtherIssueDetails = $request->othersCheckboxesTextArea;
        // $dentalHistory->reasonDentalConsultation = $request->reasonDentalConsultationTextarea;
        $dentalHistory->isDeleted = "0";

        $dentalHistory->save();

        // $patientid = Session::get('patientInfo.patientID');

        // return view ('dentist.C_dentist_dental_chart')->with('patientid', $patientid);

       }
       catch(Exception $e){

       }
    }

    public function dChiefStore(Request $request)
    {
       try{

        // $patientID = DentalLog::join('patients', 'patients.patientID', '=', 'cliniclogs.patientID')
        //                         ->orderBy('cliniclogs.clinicLogID', 'desc')
        //                         ->select('patients.*','cliniclogs.*')
        //                         ->where([['cliniclogs.isDeleted', '<>', '1'], ['cliniclogs.clinicType', '=', 'D']])
        //                         ->first();

        $dentalHistory = new DentalHistory;

        $dentalHistory->patientID = Session::get('patientInfo.patientID');
        $dentalHistory->physicianName = $request->physicianName;
        $dentalHistory->physicianSpecialty = $request->physicianSpecialty;
        $dentalHistory->phyOfficeAdd = $request->officeAddress;
        $dentalHistory->phyOfficeNum = $request->officeNumber;
        $dentalHistory->inGoodHealth = $request->goodHealth;
        $dentalHistory->underMedTreatment = $request->medicalTreatmentRdBtn;
        $dentalHistory->conditionTreated = $request->medicalTreatmentTextarea;
        $dentalHistory->hadIllnessSurgOpr = $request->seriousIllnessRdBtn;
        $dentalHistory->illnessSurgOprDetails = $request->seriousIllnessTextarea;
        $dentalHistory->isHospitalized = $request->hospitalizedRdBtn;
        $dentalHistory->reasonForHosp = $request->hospitalizedTextarea;
        $dentalHistory->takesMedication = $request->medicationRdBtn;
        $dentalHistory->medSpecification = $request->medicationTextarea;
        $dentalHistory->useTobacco = $request->tobacco;
        $dentalHistory->useAlcOrDrugs = $request->alcoholUse;
        $dentalHistory->allergicToLclAnesthetic = $request->allergyLocalAnesthetic;
        $dentalHistory->allergicToSultaDrugs = $request->allergySultaDrugs;
        $dentalHistory->allergicToAspirin = $request->allergyAspirin;
        $dentalHistory->allergicToPenAntibiotics = $request->allergyPenicillinAntibiotics;
        $dentalHistory->allergicToLatex = $request->allergyLatex;
        $dentalHistory->allergicToOther = $request->allergyOthers;
        $dentalHistory->OtherAllergyDetails = $request->allergyOthersTextarea;
        $dentalHistory->isBleeding = $request->bleedingGumsRdBtn;
        $dentalHistory->bleedingTime = $request->bleedingTimeTextbox;
        $dentalHistory->isPregnant =  $request->pregnant;
        $dentalHistory->isNursing = $request->nursing;
        $dentalHistory->isTakingBirthControls = $request->birthControlPills;
        $dentalHistory->bloodType = $request->bloodTypeTextbox;
        // $dentalHistory->bloodPressure = $request->bloodPressureTextbox;
        $dentalHistory->hasHighBloodPress = $request->highBloodCheckbox;
        $dentalHistory->hasLowBloodPress = $request->lowBloodCheckbox;
        $dentalHistory->hasEpiConvulsions = $request->epilepsyCheckbox;
        $dentalHistory->hasAidsHIV = $request->aidsCheckbox;
        $dentalHistory->hasSTD = $request->stdCheckbox;
        $dentalHistory->hasStomachTrbls = $request->ulcersCheckbox;
        $dentalHistory->hasFaintingSeizure = $request->faintingSeizuresCheckbox;
        $dentalHistory->hasRapidWeightLoss = $request->weightLossCheckbox;
        $dentalHistory->hasRadiotheraphy = $request->radiationTherapyCheckbox;
        $dentalHistory->hasJointRepImplacement = $request->jointReplacementCheckbox;
        $dentalHistory->hasHeartSurgery = $request->heartSurgeryCheckbox;
        $dentalHistory->hasHeartAttack = $request->heartAttackCheckbox;
        $dentalHistory->hasThyroidProbs = $request->thyroidProblemCheckbox;
        $dentalHistory->hasHeartDisease = $request->heartDiseaseCheckbox;
        $dentalHistory->hasHeartMurmur = $request->heartMurmurCheckbox;
        $dentalHistory->hasHepaLiverDisease = $request->liverDiseaseCheckbox;
        $dentalHistory->hasRheumaticFever = $request->rheumaticCheckbox;
        $dentalHistory->hasHayfeverAllergies = $request->hayFeverCheckbox;
        $dentalHistory->hasRespiratoryProbs = $request->respiratoryCheckbox;
        $dentalHistory->hasHepatitisJaundice = $request->hepatitisCheckbox;
        $dentalHistory->hasTB = $request->tuberculosisCheckbox;
        $dentalHistory->hasSwollenAnkles = $request->swollenAnklesCheckbox;
        $dentalHistory->hasKidneyDisease = $request->kidneyDiseaseCheckbox;
        $dentalHistory->hasDiabetes = $request->diabetesCheckbox;
        $dentalHistory->hasChestPain = $request->chestPainCheckbox;
        $dentalHistory->hasStroke = $request->strokeCheckbox;
        $dentalHistory->hasCancerTumor = $request->cancerTumorsCheckbox;
        $dentalHistory->hasAnemia = $request->anemiaCheckbox;
        $dentalHistory->hasAngina = $request->anginaCheckbox;
        $dentalHistory->hasAsthma = $request->asthmaCheckbox;
        $dentalHistory->hasEmphysema = $request->emphysemaCheckbox;
        $dentalHistory->hasBleedingProbs = $request->bleedingProblemsCheckbox;
        $dentalHistory->hasBloodDisease = $request->bloodDiseaseCheckbox;
        $dentalHistory->hasHeadInjuries = $request->headInjuriesCheckbox;
        $dentalHistory->hasArthritisRheuma = $request->arthritisCheckbox;
        $dentalHistory->hasOthers = $request->othersCheckbox;
        $dentalHistory->OtherIssueDetails = $request->othersCheckboxesTextArea;
        // $dentalHistory->reasonDentalConsultation = $request->reasonDentalConsultationTextarea;
        $dentalHistory->isDeleted = "0";

        $dentalHistory->save();

        // $patientid = Session::get('patientInfo.patientID');

        // return view ('dentist.C_dentist_dental_chart')->with('patientid', $patientid);

       }
       catch(Exception $e){

       }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dentalHistory = DentalHistory::find($id);

        $patientHistoryInfo = DentalHistory::join('patients', 'patients.patientID', '=', 'dentalhistories.patientID')
                                    ->select('patients.*', 'dentalhistories.*')
                                    ->where('dentalhistories.isDeleted', '=', '0')
                                    ->where('dentalhistories.dentalHistoryID', '=', $id)
                                    ->first();


        return view('dentist.C_dentist_patient_edit_history')->with(['patientHistoryInfo' => $patientHistoryInfo, 'dentalHistory' => $dentalHistory]);
    }
    public function dChiefEdit($id)
    {
        $dentalHistory = DentalHistory::find($id);

        $patientHistoryInfo = DentalHistory::join('patients', 'patients.patientID', '=', 'dentalhistories.patientID')
                                    ->select('patients.*', 'dentalhistories.*')
                                    ->where('dentalhistories.isDeleted', '=', '0')
                                    ->where('dentalhistories.dentalHistoryID', '=', $id)
                                    ->first();


        return view('dchief.C_dchief_patient_edit_history')->with(['patientHistoryInfo' => $patientHistoryInfo, 'dentalHistory' => $dentalHistory]);
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

        $dentalHistory = DentalHistory::find($id);


        // $dentalHistory->patientID = Session::get('');
        $dentalHistory->physicianName = $request->physicianName;
        $dentalHistory->physicianSpecialty = $request->physicianSpecialty;
        $dentalHistory->phyOfficeAdd = $request->officeAddress;
        $dentalHistory->phyOfficeNum = $request->officeNumber;
        $dentalHistory->inGoodHealth = $request->goodHealth;
        $dentalHistory->underMedTreatment = $request->medicalTreatmentRdBtn;
        $dentalHistory->conditionTreated = $request->medicalTreatmentTextarea;
        $dentalHistory->hadIllnessSurgOpr = $request->seriousIllnessRdBtn;
        $dentalHistory->illnessSurgOprDetails = $request->seriousIllnessTextarea;
        $dentalHistory->isHospitalized = $request->hospitalizedRdBtn;
        $dentalHistory->reasonForHosp = $request->hospitalizedTextarea;
        $dentalHistory->takesMedication = $request->medicationRdBtn;
        $dentalHistory->medSpecification = $request->medicationTextarea;
        $dentalHistory->useTobacco = $request->tobacco;
        $dentalHistory->useAlcOrDrugs = $request->alcoholUse;
        $dentalHistory->allergicToLclAnesthetic = $request->allergyLocalAnesthetic;
        $dentalHistory->allergicToSultaDrugs = $request->allergySultaDrugs;
        $dentalHistory->allergicToAspirin = $request->allergyAspirin;
        $dentalHistory->allergicToPenAntibiotics = $request->allergyPenicillinAntibiotics;
        $dentalHistory->allergicToLatex = $request->allergyLatex;
        $dentalHistory->allergicToOther = $request->allergyOthers;
        $dentalHistory->OtherAllergyDetails = $request->allergyOthersTextarea;
        $dentalHistory->isBleeding = $request->bleedingGumsRdBtn;
        $dentalHistory->bleedingTime = $request->bleedingTimeTextbox;
        $dentalHistory->isPregnant =  $request->pregnant;
        $dentalHistory->isNursing = $request->nursing;
        $dentalHistory->isTakingBirthControls = $request->birthControlPills;
        $dentalHistory->bloodType = $request->bloodTypeTextbox;
        // $dentalHistory->bloodPressure = $request->bloodPressureTextbox;
        $dentalHistory->hasHighBloodPress = $request->highBloodCheckbox;
        $dentalHistory->hasLowBloodPress = $request->lowBloodCheckbox;
        $dentalHistory->hasEpiConvulsions = $request->epilepsyCheckbox;
        $dentalHistory->hasAidsHIV = $request->aidsCheckbox;
        $dentalHistory->hasSTD = $request->stdCheckbox;
        $dentalHistory->hasStomachTrbls = $request->ulcersCheckbox;
        $dentalHistory->hasFaintingSeizure = $request->faintingSeizuresCheckbox;
        $dentalHistory->hasRapidWeightLoss = $request->weightLossCheckbox;
        $dentalHistory->hasRadiotheraphy = $request->radiationTherapyCheckbox;
        $dentalHistory->hasJointRepImplacement = $request->jointReplacementCheckbox;
        $dentalHistory->hasHeartSurgery = $request->heartSurgeryCheckbox;
        $dentalHistory->hasHeartAttack = $request->heartAttackCheckbox;
        $dentalHistory->hasThyroidProbs = $request->thyroidProblemCheckbox;
        $dentalHistory->hasHeartDisease = $request->heartDiseaseCheckbox;
        $dentalHistory->hasHeartMurmur = $request->heartMurmurCheckbox;
        $dentalHistory->hasHepaLiverDisease = $request->liverDiseaseCheckbox;
        $dentalHistory->hasRheumaticFever = $request->rheumaticCheckbox;
        $dentalHistory->hasHayfeverAllergies = $request->hayFeverCheckbox;
        $dentalHistory->hasRespiratoryProbs = $request->respiratoryCheckbox;
        $dentalHistory->hasHepatitisJaundice = $request->hepatitisCheckbox;
        $dentalHistory->hasTB = $request->tuberculosisCheckbox;
        $dentalHistory->hasSwollenAnkles = $request->swollenAnklesCheckbox;
        $dentalHistory->hasKidneyDisease = $request->kidneyDiseaseCheckbox;
        $dentalHistory->hasDiabetes = $request->diabetesCheckbox;
        $dentalHistory->hasChestPain = $request->chestPainCheckbox;
        $dentalHistory->hasStroke = $request->strokeCheckbox;
        $dentalHistory->hasCancerTumor = $request->cancerTumorsCheckbox;
        $dentalHistory->hasAnemia = $request->anemiaCheckbox;
        $dentalHistory->hasAngina = $request->anginaCheckbox;
        $dentalHistory->hasAsthma = $request->asthmaCheckbox;
        $dentalHistory->hasEmphysema = $request->emphysemaCheckbox;
        $dentalHistory->hasBleedingProbs = $request->bleedingProblemsCheckbox;
        $dentalHistory->hasBloodDisease = $request->bloodDiseaseCheckbox;
        $dentalHistory->hasHeadInjuries = $request->headInjuriesCheckbox;
        $dentalHistory->hasArthritisRheuma = $request->arthritisCheckbox;
        $dentalHistory->hasOthers = $request->othersCheckbox;
        $dentalHistory->OtherIssueDetails = $request->othersCheckboxesTextArea;
        // $dentalHistory->reasonDentalConsultation = $request->reasonDentalConsultationTextarea;
        $dentalHistory->isDeleted = "0";

        $dentalHistory->save();
    }
    public function dChiefUpdate(Request $request, $id)
    {

        $dentalHistory = DentalHistory::find($id);


        // $dentalHistory->patientID = Session::get('');
        $dentalHistory->physicianName = $request->physicianName;
        $dentalHistory->physicianSpecialty = $request->physicianSpecialty;
        $dentalHistory->phyOfficeAdd = $request->officeAddress;
        $dentalHistory->phyOfficeNum = $request->officeNumber;
        $dentalHistory->inGoodHealth = $request->goodHealth;
        $dentalHistory->underMedTreatment = $request->medicalTreatmentRdBtn;
        $dentalHistory->conditionTreated = $request->medicalTreatmentTextarea;
        $dentalHistory->hadIllnessSurgOpr = $request->seriousIllnessRdBtn;
        $dentalHistory->illnessSurgOprDetails = $request->seriousIllnessTextarea;
        $dentalHistory->isHospitalized = $request->hospitalizedRdBtn;
        $dentalHistory->reasonForHosp = $request->hospitalizedTextarea;
        $dentalHistory->takesMedication = $request->medicationRdBtn;
        $dentalHistory->medSpecification = $request->medicationTextarea;
        $dentalHistory->useTobacco = $request->tobacco;
        $dentalHistory->useAlcOrDrugs = $request->alcoholUse;
        $dentalHistory->allergicToLclAnesthetic = $request->allergyLocalAnesthetic;
        $dentalHistory->allergicToSultaDrugs = $request->allergySultaDrugs;
        $dentalHistory->allergicToAspirin = $request->allergyAspirin;
        $dentalHistory->allergicToPenAntibiotics = $request->allergyPenicillinAntibiotics;
        $dentalHistory->allergicToLatex = $request->allergyLatex;
        $dentalHistory->allergicToOther = $request->allergyOthers;
        $dentalHistory->OtherAllergyDetails = $request->allergyOthersTextarea;
        $dentalHistory->isBleeding = $request->bleedingGumsRdBtn;
        $dentalHistory->bleedingTime = $request->bleedingTimeTextbox;
        $dentalHistory->isPregnant =  $request->pregnant;
        $dentalHistory->isNursing = $request->nursing;
        $dentalHistory->isTakingBirthControls = $request->birthControlPills;
        $dentalHistory->bloodType = $request->bloodTypeTextbox;
        // $dentalHistory->bloodPressure = $request->bloodPressureTextbox;
        $dentalHistory->hasHighBloodPress = $request->highBloodCheckbox;
        $dentalHistory->hasLowBloodPress = $request->lowBloodCheckbox;
        $dentalHistory->hasEpiConvulsions = $request->epilepsyCheckbox;
        $dentalHistory->hasAidsHIV = $request->aidsCheckbox;
        $dentalHistory->hasSTD = $request->stdCheckbox;
        $dentalHistory->hasStomachTrbls = $request->ulcersCheckbox;
        $dentalHistory->hasFaintingSeizure = $request->faintingSeizuresCheckbox;
        $dentalHistory->hasRapidWeightLoss = $request->weightLossCheckbox;
        $dentalHistory->hasRadiotheraphy = $request->radiationTherapyCheckbox;
        $dentalHistory->hasJointRepImplacement = $request->jointReplacementCheckbox;
        $dentalHistory->hasHeartSurgery = $request->heartSurgeryCheckbox;
        $dentalHistory->hasHeartAttack = $request->heartAttackCheckbox;
        $dentalHistory->hasThyroidProbs = $request->thyroidProblemCheckbox;
        $dentalHistory->hasHeartDisease = $request->heartDiseaseCheckbox;
        $dentalHistory->hasHeartMurmur = $request->heartMurmurCheckbox;
        $dentalHistory->hasHepaLiverDisease = $request->liverDiseaseCheckbox;
        $dentalHistory->hasRheumaticFever = $request->rheumaticCheckbox;
        $dentalHistory->hasHayfeverAllergies = $request->hayFeverCheckbox;
        $dentalHistory->hasRespiratoryProbs = $request->respiratoryCheckbox;
        $dentalHistory->hasHepatitisJaundice = $request->hepatitisCheckbox;
        $dentalHistory->hasTB = $request->tuberculosisCheckbox;
        $dentalHistory->hasSwollenAnkles = $request->swollenAnklesCheckbox;
        $dentalHistory->hasKidneyDisease = $request->kidneyDiseaseCheckbox;
        $dentalHistory->hasDiabetes = $request->diabetesCheckbox;
        $dentalHistory->hasChestPain = $request->chestPainCheckbox;
        $dentalHistory->hasStroke = $request->strokeCheckbox;
        $dentalHistory->hasCancerTumor = $request->cancerTumorsCheckbox;
        $dentalHistory->hasAnemia = $request->anemiaCheckbox;
        $dentalHistory->hasAngina = $request->anginaCheckbox;
        $dentalHistory->hasAsthma = $request->asthmaCheckbox;
        $dentalHistory->hasEmphysema = $request->emphysemaCheckbox;
        $dentalHistory->hasBleedingProbs = $request->bleedingProblemsCheckbox;
        $dentalHistory->hasBloodDisease = $request->bloodDiseaseCheckbox;
        $dentalHistory->hasHeadInjuries = $request->headInjuriesCheckbox;
        $dentalHistory->hasArthritisRheuma = $request->arthritisCheckbox;
        $dentalHistory->hasOthers = $request->othersCheckbox;
        $dentalHistory->OtherIssueDetails = $request->othersCheckboxesTextArea;
        // $dentalHistory->reasonDentalConsultation = $request->reasonDentalConsultationTextarea;
        $dentalHistory->isDeleted = "0";

        $dentalHistory->save();
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

    //IMPROVED AUTOCOMPLETE (PATIENT ID/PATIENT NUMBER)
    public function autocomplete()
    {
        $patients = Patient::where('isDeleted', '=', '0')
                           ->where('patientNumber', 'LIKE', '%' . Input::get('input') . '%')
                           ->get();
        $results ['suggestions'] = [];
        foreach ($patients as $patient)
        {
            array_push( $results['suggestions'], array("value" => "$patient->patientNumber", "data" => "$patient->lastName, $patient->firstName $patient->middleName $patient->quantifier", "id" => "$patient->patientID", "number"=>"$patient->patientNumber"));
        }

        // $patientID = array("suggestions" => $results);

        return Response::json($results);

    }
    public function autocompleteDChief()
    {
        $patients = Patient::where('isDeleted', '=', '0')
                           ->where('patientNumber', 'LIKE', '%' . Input::get('input') . '%')
                           ->get();
        $results ['suggestions'] = [];
        foreach ($patients as $patient)
        {
            array_push( $results['suggestions'], array("value" => "$patient->patientNumber", "data" => "$patient->lastName, $patient->firstName $patient->middleName $patient->quantifier", "id" => "$patient->patientID", "number"=>"$patient->patientNumber"));
        }

        // $patientID = array("suggestions" => $results);

        return Response::json($results);
    }
    public function autocompleteName()
    {
        $patients = Patient::where('isDeleted', '=', '0')
                    ->where(DB::raw("CONCAT(patients.lastName,', ', patients.firstName,' ',IFNULL(patients.middleName, ''),' ', IFNULL(patients.quantifier, ''))"), 'LIKE' , '%' . Input::get('input')  . '%')
                    ->get();
        $results ['suggestions'] = [];

        foreach ($patients as $patient) {

            array_push( $results['suggestions'], array("value" => "$patient->lastName, $patient->firstName $patient->middleName $patient->quantifier", "id" => "$patient->patientID", "number" => "$patient->patientNumber"));
        }

        return Response::json($results);
    }
    public function autocompleteNameDChief()
    {
        $patients = Patient::where('isDeleted', '=', '0')
                    ->where(DB::raw("CONCAT(patients.lastName,', ', patients.firstName,' ',IFNULL(patients.middleName, ''),' ', IFNULL(patients.quantifier, ''))"), 'LIKE' , '%' . Input::get('input')  . '%')
                    ->get();
        $results ['suggestions'] = [];

        foreach ($patients as $patient) {

            array_push( $results['suggestions'], array("value" => "$patient->lastName, $patient->firstName $patient->middleName $patient->quantifier", "id" => "$patient->patientID", "number" => "$patient->patientNumber"));
        }

        return Response::json($results);
    }

    public function showDentalHistory($id)
    {
        $chosenHistory = DentalHistory::find($id);

        // $patientInfo = DentalHistory::join('patients', 'patients.patientID', '=', 'dentalhistories.patientID')
        //                             ->select('patients.*', 'dentalhistories.*')
        //                             ->where('dentalhistories.isDeleted', '=', '0')
        //                             ->where('dentalhistories.patientID', '=', $id)
        //                             ->first();
        $patientInfo = DentalHistory::join('patients', 'patients.patientID', '=', 'dentalhistories.patientID')
                                    ->select('patients.*', 'dentalhistories.*')
                                    ->where('dentalhistories.isDeleted', '=', '0')
                                    ->where('dentalhistories.dentalHistoryID', '=', $id)
                                    ->first();

        return view('dentist.C_dentist_patient_view_history')->with(['chosenHistory'=> $chosenHistory, 'patientInfo'=>$patientInfo]);
    }
    public function showDentalHistoryDChief($id)
    {
        $chosenHistory = DentalHistory::find($id);

        // $patientInfo = DentalHistory::join('patients', 'patients.patientID', '=', 'dentalhistories.patientID')
        //                             ->select('patients.*', 'dentalhistories.*')
        //                             ->where('dentalhistories.isDeleted', '=', '0')
        //                             ->where('dentalhistories.patientID', '=', $id)
        //                             ->first();
        $patientInfo = DentalHistory::join('patients', 'patients.patientID', '=', 'dentalhistories.patientID')
                                    ->select('patients.*', 'dentalhistories.*')
                                    ->where('dentalhistories.isDeleted', '=', '0')
                                    ->where('dentalhistories.dentalHistoryID', '=', $id)
                                    ->first();

        return view('dchief.C_dchief_patient_view_history')->with(['chosenHistory'=> $chosenHistory, 'patientInfo'=>$patientInfo]);
    }

}
