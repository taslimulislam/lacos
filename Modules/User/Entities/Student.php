<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Academic\Entities\Batch;
use Modules\Academic\Entities\BatchTime;
use Modules\Academic\Entities\LeadSource;
use Modules\Academic\Entities\Program;
use Modules\Branch\Entities\Branch;
use Modules\Fee\Entities\FeeCategory;
use Modules\Paymethod\Entities\Paymethod;
use Modules\StudentEnquery\Entities\Award;
use Modules\StudentEnquery\Entities\Gender;
use Modules\StudentEnquery\Entities\MobileOperator;
use Modules\StudentEnquery\Entities\Nationality;
use Modules\StudentEnquery\Entities\PreDefinedFee;
use Modules\StudentEnquery\Entities\Sponsor;
use Modules\StudentEnquery\Entities\StudentEnquery;
use Modules\StudentEnquery\Entities\StudentEnqueryPay;
use Modules\StudentEnquery\Entities\StudentStatus;
use Modules\Admission\Entities\StudentEnrollment;
use App\Models\User;
use Modules\Company\Entities\Company;
use Modules\Academic\Entities\AcademicYear;


class Student extends Model
{
    use HasFactory;

    protected $fillable = [
                        'branch_id',
                        'academic_year_id',
                        'ac_semester_id',
                        'program_id',
                        'student_enquery_id',
                        'admission_student_id',
                        'student_code',
                        'student_first_name',
                        'student_middle_name',
                        'student_last_name',
                        'gender_id',
                        'dob',
                        'nationality_id',
                        'student_contact_no',
                        'student_contact_no2',
                        'student_email',
                        'status_id',
                        'current_address',
                        'parmanent_address',
                        'sponsor_id',
                        'sponsor_name',
                        'sp_operator_id',
                        'sp_contact_no',
                        'sp_contact_no2',
                        'last_qualification',
                        'passing_year',
                        'award_id',
                        'id_proof_name',
                        'id_proof_location',
                        'pass_out_proof_name',
                        'pass_out_proof_location',
                        'parents_id_proof_name',
                        'parents_id_proof_location',
                        'father_name',
                        'father_contact',
                        'father_contact2',
                        'father_email',
                        'father_nationality',
                        'father_occupation',
                        'father_annual_income',
                        'mother_name',
                        'mother_contact',
                        'mother_contact2',
                        'mother_email',
                        'mother_nationality',
                        'mother_occupation',
                        'mother_annual_income',
                        'cc_email_invoice1',
                        'cc_email_invoice2',
                        'lead_source_id',
                        'batch_id',
                        'batch_time_id',
                        'program_fee',
                        'program_duration',
                        'nid',
                        'reg_no',
                        'adm_no',
                        'reg_date',
                        'adm_date',
                        'is_registerd',
                        'is_admitted',
                        'comments',
                        'is_replied',
                        'replied_time',
                        'replied_by',
                        'replied_comments',
                        'varification_datetime',
                        'varification_by',
                        'shift_id',

                        'marital_status_id',
                        'is_disable',
                        'disabilities_desc',
                        'region',
                        'indexnumber',
                        'totalcertificate',

                        ];

    protected $appends = ['full_name'];

    protected static function boot()
    {
        parent::boot();
        if(Auth::check()){
            self::creating(function($model) {
                $model->uuid = (string) Str::uuid();
                $model->created_by = Auth::id();
            });
            self::created(function($model) {
                $year = substr($model->academicYear->academic_year, -2);
                $semester = $model->ac_semester_id;
                $model->student_roll_id = $year .'-'.str_pad($model->id,6,0).'-'.$semester;
                $model->save();

            });
            self::updating(function($model) {
                $model->updated_by = Auth::id();
            });
        }

        static::addGlobalScope('sortByLatest', function (Builder $builder) {
            $builder->orderByDesc('id');
        });
    }

    public function getFullNameAttribute()
    {
        return ucwords("{$this->student_first_name} {$this->middle_name} {$this->student_last_name}");
    }

    public function gender(){
        return $this->belongsTo(Gender::class,'gender_id','id');
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function nationality(){
        return $this->belongsTo(Nationality::class,'nationality_id','id');
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function program(){
        return $this->belongsTo(Program::class);
    }
    public function batch(){
        return $this->belongsTo(Batch::class);
    }

    public function studentEnrollment(){
        return $this->hasOne(StudentEnrollment::class);
    }

    public function academicYear(){
        return $this->belongsTo(AcademicYear::class);
    }

}
