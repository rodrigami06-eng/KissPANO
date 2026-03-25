<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Venta;
use Authorization\IdentityInterface;

/**
 * Venta policy
 */
class VentaPolicy
{
    /**
     * Check if $user can add Venta
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Venta $venta
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Venta $venta)
    {
    }

    /**
     * Check if $user can edit Venta
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Venta $venta
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Venta $venta)
    {
    }

    /**
     * Check if $user can delete Venta
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Venta $venta
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Venta $venta)
    {
    }

    /**
     * Check if $user can view Venta
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Venta $venta
     * @return bool
     */
    public function canView(IdentityInterface $user, Venta $venta)
    {
    }
}
