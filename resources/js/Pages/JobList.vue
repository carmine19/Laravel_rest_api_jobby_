<template>
<div>


     <div class="container mx-auto px-2 sm:px-10 max-w-3xl mt-10">

         <div class="box-title">
             <h1 class="text-center text-indigo-500">joblist</h1>
         </div>
            <div class="py-8">
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                            <tr>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    titolo
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    descrizione
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    inizio attività
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    durata
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    compenso orario
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    autore
                                </th>
                            </tr>
                            </thead>
                            <tbody>


                            <tr v-for="job in jobList.data" :key="job.id">
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <a href="#" class="block relative">

                                            </a>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                               {{ job.title }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{  job.description.substring(0, 25) + '...' }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ job.start_activity_date }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                    </span>
                                    <span class="relative">
                                        {{ job.duration_activity  }} <span>{{ job.duration_activity < 1 ? 'm' : 'h' }}</span>
                                    </span>
                                </span>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                        {{ job.price  }} <span>€</span>
                                    </a>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                        {{ job.author_id }}
                                    </a>
                                </td>
                            </tr>
                            </tbody>



                        </table>
                        <div class="px-5 bg-white py-5 flex flex-col xs:flex-row items-center xs:justify-between">
                            <div class="flex items-center">
                                <button type="button" class="w-full p-4 border text-base rounded-l-xl text-gray-600 bg-white hover:bg-gray-100">
                                    &lt;
                                </button>

                                <button type="button" class="w-full px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100 ">
                                    {{pagination.current_page}}
                                </button>

                                <a href="" type="button" class="w-full p-4 border-t border-b border-r text-base  rounded-r-xl text-gray-600 bg-white hover:bg-gray-100">
                                    >
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>
</template>

<script>

export default {
    name: "JobList",

    data() {
            return {
              jobList: [], pagination: [], next:''
            }
        },
        methods: {
            getJob(){
                axios.get('/api/jobs')
                     .then((response)=>{
                         console.log(response.data.jobs)
                         this.jobList = response.data.jobs
                     })
            },

            getPagination(){
                axios.get('/api/jobs')
                     .then((response)=>{
                         console.log(response.data.pagination)
                         this.pagination = response.data.pagination
                     })
            },

            getNext() {
                axios.get('/api/jobs')
                     .then((response)=>{
                         console.log(response.data.jobs.next_page_url)
                         this.next = response.data.jobs.next_page_url

                     })
            },

        },
        created() {
            this.getJob()
            this.getPagination()
            this.getNext()


        }
}
</script>

<style scoped>

.container .box-title h1 {
    text-transform: uppercase;
    font-size: 35px;
}

</style>
