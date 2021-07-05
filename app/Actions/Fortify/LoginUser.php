<?php


namespace App\Actions\Fortify;


use App\Models\User;
use App\Services\Projects\ProjectServiceInterface;
use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

class LoginUser
{

    /**
     * Login constructor.
     *
     * @param StatefulGuard           $guard
     * @param ProjectServiceInterface $projectService
     */
    public function __construct(
        private StatefulGuard $guard,
        private ProjectServiceInterface $projectService
    )
    {
    }

    /**
     * @param LoginRequest $request
     * @return User|null
     */
    public function authenticate(LoginRequest $request): ?User
    {
        if($this->guard->attemptWhen(
            $request->only(Fortify::username(), 'password'),
            $this, // run __invoke method
            $request->filled('remember')
        )){
            /**
             * @var User $user
             */
            $user = $this->guard->user();
            $user->switchProject($this->projectService->getProject());
            return $user;
        }
        return null;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function __invoke(User $user): bool
    {
        return $user
            ->projects()
            ->whereProjectId($this->projectService->getProject()->id)
            ->exists();
    }
}
