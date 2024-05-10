package erronka_reku;

import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import java.util.ArrayList;
import java.util.Date;
import static org.junit.jupiter.api.Assertions.*;

class jokalariakTest {
    private jokalariak jokalariakManager;

    @BeforeEach
    void setUp() {
        jokalariakManager = new jokalariak();
    }

    @Test
    void gehituJokalaria() {
        assertEquals(0, jokalariakManager.getJokalariak().size());

        jokalariakManager.gehituJokalaria("12345678A", "Iker", "Casillas", new Date(), "Espainia", 3, "iker_casillas", "contraseña");

        assertEquals(1, jokalariakManager.getJokalariak().size());

        jokalariakManager.gehituJokalaria("87654321B", "Lionel", "Messi", new Date(), "Argentina", 5, "lionel_messi", "password");

        assertEquals(2, jokalariakManager.getJokalariak().size());
    }

}
