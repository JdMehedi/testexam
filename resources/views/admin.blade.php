<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data List') }}
        </h2>
    </x-slot>

  
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="w-full mt-6"> 
                  <div class="w-1/2 flex justify-start my-6" style="margin:015px 0">
                    <div class=" w-1/2 ">
                          <input type="text"  placeholder="Search data" onkeyup="searchFunc(this.value)">
                      </div>
                      <div class="w-1/2">
                      <select style="margin:0 15px" name="" id="" onchange="filterFunction(this.value)">
                              <option value="">---select Admin---</option>
                              @foreach ($adminLists as $adminList)
                              <option value="{{ $adminList->name }}">{{ $adminList->name }}</option>
                              @endforeach
                          </select>
                          <select name="" id="" onchange="filterFunction(this.value)">
                              <option value="">---select Agent---</option>
                              @foreach ($agentLists as $agentList)
                              <option value="{{ $agentList->name }}">{{ $agentList->name }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="w-full">
                      <div class="bg-white overflow-auto">
                            <table class="min-w-full bg-white table-auto">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Sl</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">User Name</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">User Email</th>
                                    </tr>
                                </thead>
                                <?php  $index = 1 ?>


                                <tbody class="text-gray-700 border border-gray-200 ">
                                    @foreach ($lists as $list)
                                        <tr class="myLi border border-gray-300 ">
                                            <td class="w-1/3 text-left py-3 px-4 border">{{ $index++}}</td>
                                            <td class="w-1/3 text-left py-3 px-4 border">{{ $list->user_id }}</td>
                                            <td class="w-1/3 text-left py-3 px-4 border">{{ $list->name }}</td>
                                            <td class="w-1/3 text-left py-3 px-4 border">{{ $list->email }}</td>
                                        </tr>
                                    @endforeach 
                                    @foreach ($adminLists as $adminList)
                                        <tr class="myLi  border border-gray-300">
                                            <td class="w-1/3 text-left py-3 px-4 border">{{ $index++}}</td>
                                            <td class="w-1/3 text-left py-3 px-4 border">{{ $adminList->user_id}}</td>
                                            <td class="w-1/3 text-left py-3 px-4 border">{{ $adminList->name }}</td>
                                            <td class="w-1/3 text-left py-3 px-4 border">{{ $adminList->email }}</td>
                                        </tr>
                                    @endforeach  
                                    @foreach ($agentLists as $agentList)
                                        <tr class="myLi  border border-gray-300">
                                            <td class="w-1/3 text-left py-3 px-4 border">{{ $index++}}</td>
                                            <td class="w-1/3 text-left py-3 px-4 border">{{ $agentList->user_id }}</td>
                                            <td class="w-1/3 text-left py-3 px-4 border">{{ $agentList->name }}</td>
                                            <td class="w-1/3 text-left py-3 px-4 border">{{ $agentList->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      </div>
                </div>
                
            </main>
        </div>
        <section class="hidden" id="searchParam">
            
        </section>
        <script>
        function filterFunction(data) {
            let inputVal = data.toLowerCase();
            let myLi = document.querySelectorAll(".myLi");

            for (let i = 0; i < myLi.length; i++) {
                if (!inputVal || myLi[i].innerHTML.toLowerCase().indexOf(inputVal) > -1) {
                    myLi[i].classList.remove('hidden');
                } else {
                    myLi[i].classList.add('hidden');
                }
            }
        }

        function searchFunc(data) {
            if (event.key === 'Enter') {
                let inputVal = data.toLowerCase();
                let searchParam = document.getElementById("searchParam")
                searchParam.innerHTML += '<div class="newParam">'+inputVal+'</div>';
                let myLi = document.querySelectorAll(".myLi");
                for (let i = 0; i < myLi.length; i++) {
                    myLi[i].classList.add('hidden');
                }
    
                searchParam.querySelectorAll('.newParam').forEach(function(val){
                    for (let i = 0; i < myLi.length; i++) {
                        if (!val.innerHTML || myLi[i].innerHTML.toLowerCase().indexOf(val.innerHTML) > -1) {
                            myLi[i].classList.remove('hidden');
                        } 
                    }
                })
                
            }
        }
        </script>

</x-app-layout>
