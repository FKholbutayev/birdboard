<template>
  <form @submit.prevent="submit">
    <modal name="new-project" classes="p-10 rounded-lg" height="auto">
      <h1 class="font-normal mb-16 text-center text-2xl">Let's start something new</h1>
      <div class="flex">
        <div class="flex-1 mr-4">
          <div class="mb-4">
            <label for="title" class="text-sm block mb-2">Title</label>
            <input
              type="text"
              id="title"
              v-model="form.title"
              class="border p-2 text-xs block w-full rounded"
              :class="errors.title ? 'border-red-500' : 'border-gray-300'"
            />
            <span class="text-xs text-red-500 italic" v-if="errors.title" v-text="errors.title[0]"></span>
          </div>

          <div class="mb-4">
            <label for="description" class="text-sm block mb-2">Description</label>
            <textarea
              type="text"
              id="description"
              v-model="form.description"
              class="border p-2 text-xs block w-full rounded"
              :class="errors.description ? 'border-red-500' : 'border-gray-300'"
              rows="7"
            ></textarea>
            <span class="text-xs text-red-500 italic" v-if="errors.description" v-text="errors.description[0]"></span>

          </div>
        </div>

        <div class="flex-1 ml-4">
          <div class="mb-4">
            <label class="text-sm block mb-2">Need Some Task</label>
            <input
              type="text"
              v-for="(task, index) in form.tasks"
              :key="index"
              v-model="task.body"
              placeholder="Add Task"
              class="border border-gray-300 p-2 mb-2 text-xs block w-full rounded"
            />
          </div>

          <button type="button" class="inline-flex items-center text-xs" @click="addTask">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="18"
              height="18"
              viewBox="0 0 18 18"
              class="mr-2"
            >
              <g fill="none" fill-rule="evenodd" opacity=".307">
                <path stroke="#000" stroke-opacity="0.012" stroke-width="0" d="M-3-3h24v24H-3z" />
                <path
                  fill="#000"
                  d="M9 0a9 9 0 0 0-9 9c0 4.97 4.02 9 9 9A9 9 0 0 0 9 0zm0 16c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7zm1-11H8v3H5v2h3v3h2v-3h3V8h-3V5z"
                />
              </g>
            </svg>

            <span>Add New Task Field</span>
          </button>
        </div>
      </div>


      <footer class="flex justify-end">
        <button type="button"
          @click="$modal.hide('new-project')"
          class="border border-blue-400 text-blue-400 shadow-sm py-2 px-5 rounded-lg mr-4"
        >Cancel</button>
        <button class="bg-blue-400 shadow-sm py-2 px-5 text-white rounded-lg">Create Project</button>
      </footer>

    </modal>
  </form>
</template>

<script>
import BirdboardForm from './BirdboardForm';

export default {
  data() {
    return {
      form: {
        title: "",
        description: "",
        tasks: [{ body: "" }]
      },

      errors: {}
    };
  },
  methods: {
    addTask() {
      this.form.tasks.push({ body: "" });
    },

    isEmpty(str) {
        return (!str.trim() || 0 === str.trim().length)
    },

    submit() {
        if(this.form.tasks.length === 1) {
            let { body } = this.form.tasks.find(task => task)
            if(this.isEmpty(body)) {
                delete this.form.tasks;
            }
        }
        axios.post('/projects', this.form)
        .then(response => {
            location = response.data.path
        })
        .catch(error => {
            this.errors = error.response.data.errors
        })
    }
  }
};
</script>
