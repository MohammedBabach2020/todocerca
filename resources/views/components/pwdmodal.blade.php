<div id="editPassword" style="display: none;" class="p-2">
    <a href="javascript:void(0)" class="text-dark text-left closebtn " onclick="togglePwdEdit()">&times;</a>
    <form class="mt-3" action="{{ route('editpassword.users') }}" method="POST">
        @csrf
        <div class="mb-5">
            <input type="password" name="oldpwd" placeholder="Contraseña anterior"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0">
        </div>
        <div class="mb-5">
            <input type="password" name="newpwd" placeholder="Nueva contraseña"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0">
        </div>
        <div class="mb-5">
            <input type="password" name="confirmNewPwd" placeholder="Confirmar nueva contraseña"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0">
        </div>
        <button type="submit" class="btn text-light bg-green pt-3 pb-3 mt-3"><b>Editar mi
                contraseña</b></button>
    </form>

</div>
