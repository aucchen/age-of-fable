#!/bin/bash

# https://web.archive.org/web/*/http://www.apolitical.info/webgame/images/*

image_urls=("cave.jpg" "clearing.jpg" "client.jpg" "courtyard.jpg" "cpede.jpg" "creature.jpg" "croupier.jpg" "crowd.jpg" "cthulu.jpg" "darkman.jpg" "death.jpg" "dragonhead.jpg" "dragonslayers.jpg" "drowned.jpg" "dusk.jpg" "dwarf_tree.jpg" "elephant.jpg" "emperor.jpg" "evilgod.jpg" "exit.jpg" "eyes.jpg" "fairies.jpg" "fallenlightsbanner.jpg" "faust.jpg" "femalepirate.jpg" "flight.jpg" "flyer.jpg" "flying.jpg" "forestpath.jpg" "froghawker.jpg" "greeneye.jpg" "horsewoman.jpg" "hrothulf.jpg" "imp.jpg" "island.jpg" "kmdril.jpg" "land.jpg" "latpriestess.jpg" "leaveship.jpg" "lodge.jpg" "merchant.jpg" "moving.jpg" "nara.jpg" "nobles.jpg" "nomad.jpg" "orc.jpg" "outtosea.jpg" "owls.jpg" "pirateelf.jpg" "planet.jpg" "plank.jpg" "priestess.jpg" "queen.jpg" "ratperson.jpg" "raven.jpg" "reader.jpg" "reaper.jpg" "readbeast.jpg" "revengefrog.jpg" "ritual.jpg" "river.jpg" "rogue.jpg" "ruins.jpg" "sheeptree.jpg" "shelter.jpg" "shopkeep.jpg" "skin.jpg" "slaver.jpg" "snowruin.jpg" "snowskull.jpg" "spider.jpg" "spiderhead.jpg" "stage.jpg" "stair.jpg" "steveargylebanner.jpg" "stragemount.jpg" "swamp.jpg" "swanroad.jpg" "swordsman.jpg" "threeslugs.jpg" "tower.jpg" "troll.jpg" "tunnel.jpg" "turtleman.jpg" "unicorn.jpg" "wander.jpg" "wilddog.jpg" "wildwoman.jpg" "winged.jpg" "witch.jpg" "wizard.jpg" "wvillage.jpg" "youngelf.jpg" "youngman.jpg" "zareth.jpg")

# hair, magic shields are skipped
# also *-thumb.jpg files are skipped

for value in ${image_urls[@]}
do
    wget https://web.archive.org/web/20160530131213/http://www.apolitical.info/webgame/images/$value
done

