<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use App\Project;
use App\User;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
            if($this->project) {
                return Gate::allows("update", $this->route('project'));
            };
            return Gate::allows("create", Project::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => 'sometimes | required',
            'description' => 'sometimes | required',
            'notes' => 'nullable'
        ];
    }

    public function project() {
        return $this->route('project');
    }

    public function record() {
        return $this->user()->projects()->create($this->validated());
    }

    public function persist() {
        $this->project()->update($this->validated());
    }

}
