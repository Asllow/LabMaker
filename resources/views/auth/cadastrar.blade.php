@extends('layouts.header')

@section('title', 'Cadastrar')

@section('main')
    <section class="section">
        <div class="container2">
            <div class="backbox">
                <div class="signupMsg">
                    <div class="textcontent">
                        <p class="title-alt">Já tem uma conta?</p>
                        <a id="switch1" href="{{ route('entrar') }}" class="">Entre aqui</a>
                    </div>
                </div>
            </div>
            <div class="frontbox">
                <div class="signup">
                    <h2 class="title">Cadastrar</h2>
                    <p>Crie uma conta</p>
                    <form class="inputbox" action="{{ route('cadastrar.save') }}" method="POST" class="space-y-4 md:space-y-6">
                        @csrf
                        <div class="step-ball">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                        <div class="button-pass">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Próximo</button>
                        </div>
                        <div class="tab">
                            <div>
                                <label for="name" class="">Nome</label>
                                <input type="text" name="name" id="name" class="" placeholder="Seu nome" required=""  autocomplete="off" value="{{ old('name') }}">
                                @error('name')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="last_name" class="">Sobrenome</label>
                                <input type="last_name" name="last_name" id="last_name" class="" placeholder="Seu sobrenome" required="" autocomplete="off" value="{{ old('last_name') }}">
                                @error('last_name')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="">Email</label>
                                <input type="email" name="email" id="email" class="" placeholder="nome@instituição.com" required="" autocomplete="off" value="{{ old('email') }}">
                                @error('email')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="tab">
                            <div>
                                <label for="registration" class="">Número de matrícula</label>
                                <input type="tel" name="registration" id="registration" class="" placeholder="Sua matricula"  maxlength="11" pattern="[0-9]{11}" autocomplete="off" value="{{ old('registration') }}">
                            </div>
                            <div class="">
                                <div class="">
                                    <input type="checkbox" class='checkbox' id="registrationfalse" name="registrationfalse" aria-describedby="registrationfalse" class="">
                                </div>
                                <div class="">
                                    <label for="registrationfalse" class="">
                                        Não possuo número de matrícula
                                    </label>
                                </div>
                                @error('registration')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="course" class="">Seu curso</label>
                                <select name="course" id="course" required>
                                    <option selected disabled>Selecione seu curso</option>
                                    <option value="1">Engenharia Mecatrônica</option>
                                    <option value="2">Engenharia de Computação</option>
                                    <option value="3">Design de Moda</option>
                                    <option value="4">Téc. em Mecatrônica</option>
                                    <option value="5">Téc. em Informática</option>
                                    <option value="6">Téc. em Produção de Moda</option>
                                    <option value="7">Téc. em Eletromecânica</option>
                                    <option value="8">Téc. em Informática para internet</option>
                                    <option value="9">Servidor do CEFET</option>
                                    <option value="0">Não tenho curso</option>
                                </select>
                                @error('course')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="tab">
                            <div>
                                <label for="birth_date" class="">Data de Nascimento</label>
                                <input type="date" name="birth_date" id="birth_date" placeholder="Sua data de nascimento" class="" required="" value="{{ old('birth_date') }}">
                                @error('birth_date')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="phone" class="">Telefone</label>
                                <input onkeydown="phoneNumberFormatter()" type="tel" name="phone" id="phone" placeholder="(99) 99999-9999" class="" maxlength="15" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{5})-([0-9]{4})" autocomplete="off" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="tab">
                            <div>
                                <label for="password" class="">Senha</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="" required="">
                                @error('password')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="">Confirme a senha</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="" required="">
                                @error('password_confirmation')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <div class="">
                                    <input id="terms" aria-describedby="terms" type="checkbox" class="checkbox" required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="terms" class="">
                                        Eu aceito os<a class="" href="#">Termos e Condições</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        let currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            const x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n === 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n === (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Criar conta";
            } else {
                document.getElementById("nextBtn").innerHTML = "Próximo";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            const x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:

            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            let i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }

        function formatPhoneNumber(value) {
            if (!value) return value;
            const phoneNumber = value.replace(/[^\d]/g, '');
            const phoneNumberLength = phoneNumber.length;
            if (phoneNumberLength < 3) return phoneNumber;
            if (phoneNumberLength < 9) {
                return `(${phoneNumber.slice(0, 2)}) ${phoneNumber.slice(2)}`;
            }
            return `(${phoneNumber.slice(0, 2)}) ${phoneNumber.slice(2,7)}-${phoneNumber.slice(7, 11)}`;
        }

        function phoneNumberFormatter() {
            const inputField = document.getElementById('phone');
            const formattedInputValue = formatPhoneNumber(inputField.value);
            inputField.value = formattedInputValue;
        }
    </script>
@endsection
