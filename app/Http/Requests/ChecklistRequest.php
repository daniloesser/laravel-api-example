<?php

namespace App\Http\Requests;

use App\Models\Series;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChecklistRequest extends FormRequest
{

    private $includes;

    /**
     * @return mixed
     */
    public function getIncludes()
    {
        return $this->includes;
    }

    /**
     * @param mixed $includes
     */
    public function setIncludes($includes): void
    {
        $this->includes = $includes;
    }

    /**
     * @return mixed
     */
    public function getExcludes()
    {
        return $this->excludes;
    }

    /**
     * @param mixed $excludes
     */
    public function setExcludes($excludes): void
    {
        $this->excludes = $excludes;
    }

    /**
     * @return mixed
     */
    public function getPaginated()
    {
        return $this->paginated;
    }

    /**
     * @param mixed $paginated
     */
    public function setPaginated($paginated): void
    {
        $this->paginated = $paginated;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param mixed $pageSize
     */
    public function setPageSize($pageSize): void
    {
        $this->pageSize = $pageSize;
    }

    private $excludes;
    private $paginated;
    private $pageSize;
    private $page;


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $paymentStatus = 'paid';

        return [
            'series_fk' => [
                'required',
                Rule::exists((new Series())->getTable(), (new Series())->getKeyName())
                    ->where(function ($query) use ($paymentStatus) {
                        $query->where('payment_status', $paymentStatus)
                            ->where('is_enabled', 1);
                    }),
            ],
            'is_active' => ['required', Rule::in(['1', '0'])]
        ];
    }

    /**
     * Get the error messages that apply to the request parameters.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'series_fk.required' => 'series_fk field is required',
            'is_active.required' => 'is_active field is required',
        ];
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page): void
    {
        $this->page = $page;
    }
}
