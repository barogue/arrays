<?php

namespace Barogue\Arrays\Benchmarks;

/**
 * @BeforeMethods({"init"})
 */
class ArrayExistsBench extends Bench
{
    protected $array;

    public function benchArrayExistsDeep()
    {
        array_exists($this->array, 'a.b.c.d.e.f.g.h.i.j.k.l.m.n.o.p.q.r.s.t.u.v.w.x.y.z');
    }

    public function benchArrayExistsShallow()
    {
        array_exists($this->array, 'a');
    }

    public function init()
    {
        $this->array = [];
        array_set($this->array, 'a.b.c.d.e.f.g.h.i.j.k.l.m.n.o.p.q.r.s.t.u.v.w.x.y.z', 'test');
    }
}
