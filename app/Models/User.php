<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\{
    Proprietario,
    Agente
};

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'tipo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function agente() {
        return $this->hasOne(
            Agente::class, 
            'user_id', 
            'id'
        );
    }

    // public function proprietario() {
    //     return $this->hasOne(
    //         Proprietario::class, 
    //         'user_id', 
    //         'id'
    //     );
    // }

    public function proprietario()
    {
        return $this->hasOne(Proprietario::class, 'user_id', 'id');
    }

    public function alertas() {
        return $this->hasMany(
            Alerta::class,
            'user_id',
            'id'
        );
    }

    public function confirmacoes() {
        return $this->hasMany(
            User::class,
            'user_id',
            'id'
        );
    }

    public function alertasConfirmados()
    {
        return $this->belongsToMany(
            Alerta::class,
            'confirmacoes'
        )->withTimestamps();
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function abilities() {
        
        return $this->roles->map->abilities->flatten()->pluck('name');
    }


    public function hasRole($roles): bool
    {
        $roles = is_array($roles) ? $roles : [$roles];

        // Assumimos que a coluna 'name' existe na tabela roles
        return $this->roles()->whereIn('name', $roles)->exists();
    }

    /**
     * Retorna os nomes das roles do user como array.
     */
    public function roleNames(): array
    {
        return $this->roles->pluck('name')->toArray();
    }

    /**
     * Helpers específicos (opcionais mas úteis).
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(['admin', 'root']); // trata 'root' como admin
    }

    public function isAgente(): bool
    {
        return $this->hasRole('agente');
    }

    public function isGuestRole(): bool
    {
        return $this->hasRole('guest');
    }
}
