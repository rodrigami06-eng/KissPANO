<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Usuarios;
use Authorization\IdentityInterface;

/**
 * Usuarios policy
 */
class UsuariosPolicy
{
    /**
     * Check if $user can add Usuarios
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Usuarios $usuarios
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Usuarios $usuarios)
    {
    }

    /**
     * Check if $user can edit Usuarios
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Usuarios $usuarios
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Usuarios $usuarios)
    {
        return $user->getIdentifier() === $usuarios->id;
    }

    /**
     * Check if $user can delete Usuarios
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Usuarios $usuarios
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Usuarios $usuarios)
    {
    }

    /**
     * Check if $user can view Usuarios
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Usuarios $usuarios
     * @return bool
     */
    public function canView(IdentityInterface $user, Usuarios $usuarios)
    {
    }
}
